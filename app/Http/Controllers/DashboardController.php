<?php

namespace App\Http\Controllers;

use App\Models\WasteComposition;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
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
        $weeklyWasteData = WasteComposition::select('barangays.name', DB::raw('SUM(waste_compositions.metrics) as total_metrics'))
            ->join('barangays', 'waste_compositions.brgy_id', '=', 'barangays.id') // Join with the barangays table
            ->whereBetween(DB::raw('DATE(waste_compositions.collection_date)'), [$startOfWeek, $endOfWeek]) // Use DATE() to compare only the date part
            ->groupBy('barangays.id', 'barangays.name') // Group by barangay id and name
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

        // Count biodegradable and residual records and sum metrics
        $biodegradable = WasteComposition::where('waste_type', 'Biodegradable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->sum('metrics');

        $residual = WasteComposition::where('waste_type', 'Residual')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->sum('metrics');

        // Optionally, count the number of records for each waste type
        $biodegradableCount = WasteComposition::where('waste_type', 'Biodegradable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        $residualCount = WasteComposition::where('waste_type', 'Residual')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        return response()->json([
            'dateLabel' => $dateLabel,
            'biodegradable' => $biodegradable,
            'residual' => $residual,
            'biodegradableCount' => $biodegradableCount, // optional if needed
            'residualCount' => $residualCount,           // optional if needed
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
}
