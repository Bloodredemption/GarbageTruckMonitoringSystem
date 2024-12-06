<?php

namespace App\Http\Controllers;

use App\Models\WasteComposition;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\WasteConversion;
use App\Models\WasteAnalysis;
use App\Models\Barangay;
use App\Models\Event;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function landfill_index() 
    {
        return view('landfill.dashboard');
    }

    public function driver_index()
    {
        // Get total metrics for each waste type
        $totalBiodegradable = WasteComposition::where('waste_type', 'Biodegradable')->sum('metrics');
        $totalResidual = WasteComposition::where('waste_type', 'Residual')->sum('metrics');

        return view('driver.dashboard', compact('totalBiodegradable', 'totalResidual'));
    }

    public function getWasteCollectionData(Request $request)
    {
        $timeframe = $request->query('timeframe');
        $data = [];

        // Determine the start and end date based on the timeframe
        if ($timeframe === 'thisweek') {
            $startDate = Carbon::now()->startOfWeek(); // Start of the current week (Monday)
            $endDate = Carbon::now()->endOfWeek();     // End of the current week (Sunday)
        } elseif ($timeframe === 'lastweek') {
            $startDate = Carbon::now()->subWeek()->startOfWeek(); // Start of the last week (Monday)
            $endDate = Carbon::now()->subWeek()->endOfWeek();     // End of the last week (Sunday)
        } else {
            return response()->json(['metrics' => []]);
        }

        // Fetch and group the data by date
        $wasteData = WasteComposition::whereBetween('collection_date', [$startDate, $endDate])
            ->selectRaw('DATE(collection_date) as date, SUM(metrics) as total_metrics')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Initialize an array for all days of the week
        $daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $metricsByDay = array_fill_keys($daysOfWeek, 0); // Set default values to 0

        // Map the data to the days of the week
        foreach ($wasteData as $data) {
            $dayName = Carbon::parse($data->date)->format('D'); // Get the day name (e.g., 'Mon')
            if (array_key_exists($dayName, $metricsByDay)) {
                $metricsByDay[$dayName] = $data->total_metrics;
            }
        }

        // Convert the metrics to an array of values
        $metrics = array_values($metricsByDay);

        return response()->json(['metrics' => $metrics]);
    }

    public function lfgetWeeklyWasteData()
    {
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $wasteConversions = WasteConversion::where('status', 'Finished')
            ->whereBetween('start_date', [$startDate, $endDate])
            ->get();

        $totalMetrics = $wasteConversions->sum('metrics');

        $data = $wasteConversions->groupBy('waste_type')->map(function ($group) use ($totalMetrics) {
            $wasteTypeTotal = $group->sum('metrics');
            $percentage = ($totalMetrics > 0) ? ($wasteTypeTotal / $totalMetrics) * 100 : 0;
            return [
                'waste_type' => $group->first()->waste_type,
                'metrics' => $wasteTypeTotal,
                'percentage' => round($percentage, 1),
            ];
        })->values();

        return response()->json($data);
    }

    public function lffetchWasteData(Request $request)
    {
        $timeframe = $request->input('timeframe', 'day');
        $now = Carbon::today();  // Use today's date without time for comparison

        // Define date range based on selected timeframe
        switch ($timeframe) {
            case 'day':
                $startDate = $now;
                $endDate = $now;
                $displayDate = $now->format('F j, Y');
                $breakdown = 'Daily';
                break;
            case 'week':
                $startDate = $now->copy()->startOfWeek();
                $endDate = $now->copy()->endOfWeek();
                $displayDate = $startDate->format('F j') . ' - ' . $endDate->format('j, Y');
                $breakdown = 'Weekly';
                break;
            case 'month':
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                $displayDate = $now->format('F Y');
                $breakdown = 'Monthly';
                break;
            case 'year':
                $startDate = $now->copy()->startOfYear();
                $endDate = $now->copy()->endOfYear();
                $displayDate = 'Year ' . $now->format('Y');
                $breakdown = 'Yearly';
                break;
            default:
                return response()->json(['error' => 'Invalid timeframe selected'], 400);
        }

        // Convert startDate and endDate to strings for date comparison
        $startDateString = $startDate->format('Y-m-d');
        $endDateString = $endDate->format('Y-m-d');

        // Fetch data for each waste type with status 'Finished'
        $wasteData = WasteConversion::where('status', 'Finished')
            ->whereDate('start_date', '>=', $startDateString)
            ->whereDate('end_date', '<=', $endDateString)
            ->groupBy('waste_type')
            ->selectRaw('waste_type, SUM(metrics) as total')
            ->pluck('total', 'waste_type');

        return response()->json([
            'data' => [
                'recyclable' => $wasteData->get('Recyclable', 0),
            ],
            'displayDate' => $displayDate,
            'breakdown' => $breakdown,
        ]);
    }

    public function lffetchWasteSummary(Request $request)
    {
        $timeframe = $request->input('timeframe', 'week');  // Default to weekly

        $query = WasteConversion::where('status', 'Finished');

        // Determine grouping and formatting based on timeframe
        switch ($timeframe) {
            case 'week':
                // Define the start and end of the current week
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();

                // Sum all metrics within this week
                $total = $query
                    ->whereBetween('start_date', [$startOfWeek, $endOfWeek])
                    ->sum('metrics');

                // Format category for the current week
                $categories = [$startOfWeek->format('M j') . ' - ' . $endOfWeek->format('M j')];
                $series = [$total];
                break;

            case 'month':
                $data = $query
                    ->selectRaw('YEAR(start_date) AS year, MONTH(start_date) AS month, SUM(metrics) AS total')
                    ->groupBy('year', 'month')
                    ->orderBy('year')
                    ->orderBy('month')
                    ->get();

                $categories = [];
                $series = [];

                foreach ($data as $month) {
                    $categories[] = Carbon::createFromDate($month->year, $month->month, 1)->format('M');
                    $series[] = $month->total;
                }
                break;

            case 'year':
                $data = $query
                    ->selectRaw('YEAR(start_date) AS year, SUM(metrics) AS total')
                    ->groupBy('year')
                    ->orderBy('year')
                    ->get();

                $categories = [];
                $series = [];

                foreach ($data as $year) {
                    $categories[] = (string) $year->year;
                    $series[] = $year->total;
                }
                break;

            default:
                return response()->json(['error' => 'Invalid timeframe selected'], 400);
        }

        return response()->json([
            'categories' => $categories,
            'series' => $series,
        ]);
    }

    public function getWasteCompositionData(Request $request)
    {
        $timeframe = $request->input('timeframe', 'week');
        $categories = [];
        $series = [];

        switch ($timeframe) {
            case 'week':
                // Group by year and week number, then order by both year and week in ascending order
                $data = WasteComposition::selectRaw('YEAR(collection_date) as year, WEEK(collection_date, 1) as week, SUM(metrics) as total_metrics')
                    ->groupBy('year', 'week')
                    ->orderBy('year', 'asc')
                    ->orderBy('week', 'asc')
                    ->get();
    
                foreach ($data as $item) {
                    // Get the start and end of the week based on the year and week number
                    $startOfWeek = Carbon::now()->setISODate($item->year, $item->week)->startOfWeek()->format('M d');
                    $endOfWeek = Carbon::now()->setISODate($item->year, $item->week)->endOfWeek()->format('M d');
                    
                    // Create the week range label (e.g., "Oct 7 - Oct 13")
                    $categories[] = $startOfWeek . ' - ' . $endOfWeek;
                    
                    // Append the total metrics with "kg" suffix
                    $series[] = $item->total_metrics;
                }
                break;
    
            case 'month':
                // Group by month and sum the metrics
                $data = WasteComposition::selectRaw('MONTH(collection_date) as month, SUM(metrics) as total_metrics')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

                foreach ($data as $item) {
                    // Get the month name (e.g., "Jan", "Feb", etc.)
                    $categories[] = Carbon::create()->month($item->month)->format('M');
                    
                    // Append the total metrics with "kg" suffix
                    $series[] = $item->total_metrics;
                }
                break;

            case 'year':
                // Group by year and sum the metrics
                $data = WasteComposition::selectRaw('YEAR(collection_date) as year, SUM(metrics) as total_metrics')
                    ->groupBy('year')
                    ->orderBy('year')
                    ->get();

                foreach ($data as $item) {
                    // Use the year directly as the category label
                    $categories[] = $item->year;
                    
                    // Append the total metrics with "kg" suffix
                    $series[] = $item->total_metrics;
                }
                break;
        }

        // Return the result as a JSON response
        return response()->json([
            'categories' => $categories,
            'series' => $series
        ]);
    }

    public function getHighestWeeklyWaste()
    {
        // Get the current week range (Sunday to Saturday)
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString(); // Convert to date format (Y-m-d)
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString(); // Convert to date format (Y-m-d)

        // Query to get the sum of metrics per barangay for the week
        $weeklyWasteData = WasteComposition::select('barangays.area_name', DB::raw('SUM(waste_compositions.metrics) as total_metrics'))
            ->join('barangays', 'waste_compositions.brgy_id', '=', 'barangays.id') // Join with the barangays table
            ->whereBetween(DB::raw('DATE(waste_compositions.collection_date)'), [$startOfWeek, $endOfWeek]) // Use DATE() to compare only the date part
            ->groupBy('barangays.id', 'barangays.area_name') // Group by barangay id and name
            ->orderBy('total_metrics', 'DESC') // Order by total waste generated
            ->get();

        // Return the data as a JSON response
        return response()->json($weeklyWasteData);
    }
    
    public function getWasteData(Request $request)
    {
        $timeframe = $request->input('timeframe', 'day');
        $currentDate = Carbon::now();
        
        // Variables to hold start and end dates for the query
        $start = $currentDate;
        $end = $currentDate;
        
        switch ($timeframe) {
            case 'week':
                // Get the start and end dates of the current week (Monday-Sunday)
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                
                // Check if start and end dates are in the same month
                if ($start->format('F') === $end->format('F')) {
                    // If same month, display like "October 14-20, 2024"
                    $dateLabel = $start->format('F j') . '-' . $end->format('j, Y');
                } else {
                    // If different months, display like "September 30 - October 6, 2024"
                    $dateLabel = $start->format('F j') . ' - ' . $end->format('F j, Y');
                }
                break;
            case 'month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                $dateLabel = $currentDate->format('F Y');
                break;
            case 'year':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                $dateLabel = 'Year ' . $currentDate->format('Y');
                break;
            default:
                // Default is 'day'
                $start = $currentDate;
                $end = $currentDate;
                $dateLabel = $currentDate->format('F j, Y');
                break;
        }

        // Count biodegradable, residual, and recyclable records and sum metrics
        $biodegradable = WasteComposition::where('waste_type', 'Biodegradable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->sum('metrics');

        $residual = WasteComposition::where('waste_type', 'Residual')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->sum('metrics');
        
        $recyclable = WasteComposition::where('waste_type', 'Recyclable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->sum('metrics');

        // Optionally, count the number of records for each waste type
        $biodegradableCount = WasteComposition::where('waste_type', 'Biodegradable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        $residualCount = WasteComposition::where('waste_type', 'Residual')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        $recyclableCount = WasteComposition::where('waste_type', 'Recyclable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        return response()->json([
            'dateLabel' => $dateLabel,
            'biodegradable' => $biodegradable,
            'residual' => $residual,
            'recyclable' => $recyclable,
            'biodegradableCount' => $biodegradableCount, // optional if needed
            'residualCount' => $residualCount,           // optional if needed
            'recyclableCount' => $recyclableCount,       // optional if needed
        ]);
    }

    public function fetchWasteDataForInfo()
    {
        // Get the current week start and end
        $currentWeekStart = Carbon::now()->startOfWeek()->toDateString();  // Get date only
        $currentWeekEnd = Carbon::now()->endOfWeek()->toDateString();      // Get date only

        // Sum up metrics for all waste types for the current week (ignoring time)
        $currentWeekTotal = WasteComposition::whereBetween(DB::raw('DATE(collection_date)'), [$currentWeekStart, $currentWeekEnd])
            ->sum('metrics');  // Summing all metrics for current week

        // Get the previous week start and end
        $previousWeekStart = Carbon::now()->subWeek()->startOfWeek()->toDateString(); // Get date only
        $previousWeekEnd = Carbon::now()->subWeek()->endOfWeek()->toDateString();     // Get date only

        // Sum up metrics for all waste types for the previous week (ignoring time)
        $previousWeekTotal = WasteComposition::whereBetween(DB::raw('DATE(collection_date)'), [$previousWeekStart, $previousWeekEnd])
            ->sum('metrics');

        // Calculate the difference and percentage change between the weeks
        $difference = $currentWeekTotal - $previousWeekTotal;
        $percentageChange = $previousWeekTotal > 0 ? ($difference / $previousWeekTotal) * 100 : 0;

        // Return the response as JSON
        return response()->json([
            'currentWeekTotal' => $currentWeekTotal,
            'difference' => $difference,
            'percentageChange' => $percentageChange,
        ]);
    }

    public function getTodayWasteConverted(Request $request)
    {
        // Get today's date and the date of the same day last week
        $today = Carbon::today()->format('Y-m-d');
        $lastWeek = Carbon::today()->subWeek()->format('Y-m-d');
        
        // Calculate total waste for today
        $totalWasteToday = WasteConversion::where('status', 'Finished')
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->sum('metrics');
        
        // Calculate total waste for the same day last week
        $totalWasteLastWeek = WasteConversion::where('status', 'Finished')
            ->whereDate('start_date', '<=', $lastWeek)
            ->whereDate('end_date', '>=', $lastWeek)
            ->sum('metrics');
        
        // Calculate the waste difference
        $wasteDifference = $totalWasteToday - $totalWasteLastWeek;

        // Calculate the percentage difference, handling division by zero
        $percentageDifference = $totalWasteLastWeek > 0 
            ? round(($wasteDifference / $totalWasteLastWeek) * 100, 2)
            : 0;

        return response()->json([
            'totalWasteToday' => $totalWasteToday,
            'wasteDifference' => $wasteDifference,
            'percentageDifference' => $percentageDifference
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getDiagnosticData()
    {
        // Fetch all records from WasteAnalysis
        $wasteAnalyses = WasteAnalysis::all();

        $data = $wasteAnalyses->map(function ($analysis) {
            // Fetch area_name from Barangay
            $barangay = Barangay::find($analysis->brgy_id);
            $areaName = $barangay ? $barangay->area_name : null;

            // Fetch name from Event
            $event = Event::find($analysis->event_id);
            $eventName = $event ? $event->name : null;

            // Fetch all WasteComposition rows with matching brgy_id
            $wasteCompositions = WasteComposition::where('brgy_id', $analysis->brgy_id)->get();

            // Calculate total metrics for the barangay
            $totalMetrics = $wasteCompositions->sum('metrics');

            return [
                'area_name' => $areaName,
                'event_name' => $eventName,
                'total_metrics' => $totalMetrics,
            ];
        });

        // Rank data by total metrics (highest to lowest)
        $rankedData = $data->sortByDesc('total_metrics')->values()->all();

        return response()->json([
            'diagnosticData' => $rankedData,
        ]);
    }
}
