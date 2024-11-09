<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\CollectionSchedule;
use App\Models\WasteComposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WasteCompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDate = now();

        if (request()->ajax()) {
            $userId = Auth::id();

            $wasteCompositions = WasteComposition::whereDate('collection_date', $currentDate)
                            ->with('brgy:id,area_name')
                            ->where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            $html = view('driver.waste-composition._waste_compositions', compact('wasteCompositions'))->render();

            return response()->json(['html' => $html]);
        }

        $userId = Auth::id();

        $wasteCompositions = WasteComposition::whereDate('collection_date', $currentDate)
                        ->with('brgy:id,area_name')
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('driver.waste-composition.index', compact('wasteCompositions'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $userId = Auth::id();

        $currentDate = now();

        // Fetch waste compositions where `waste_type` or `brgy.name` matches the search query
        $wasteCompositions = WasteComposition::whereDate('collection_date', $currentDate)
                            ->with('brgy:id,area_name')
                            ->where('user_id', $userId)
                            ->whereHas('brgy', function ($q) use ($query) {
                                $q->where('area_name', 'like', "%{$query}%");
                            })
                            ->orderBy('created_at', 'desc')
                            ->get();

        // Return the view as HTML content
        return response()->json([
            'html' => view('driver.waste-composition._waste_compositions', compact('wasteCompositions'))->render()
        ]);
    }

    public function admin_index()
    {
        if (request()->ajax()) {
            $wasteCompositions = WasteComposition::with('brgy:id,area_name')
                            ->with('user:id,user_type')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteCompositions' => $wasteCompositions]);
        }

        $wasteCompositions = WasteComposition::with('brgy:id,area_name')
                            ->with('user:id,fullname,user_type')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin.waste-composition.index', compact('wasteCompositions'));
    }

    public function chartsData(Request $request) {
        $timeframe = $request->input('timeframe', 'day'); // Default to 'day' if no timeframe is provided

        // Initialize start and end date for filtering
        switch ($timeframe) {
            case 'week':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                break;
            case 'month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                break;
            case 'year':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                break;
            default:
                $start = Carbon::now()->startOfDay();
                $end = Carbon::now()->endOfDay();
                break;
        }
        
        $biodegradableCount = WasteComposition::where('waste_type', 'Biodegradable')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        $residualCount = WasteComposition::where('waste_type', 'Residual')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();


        // Return the counts as a JSON response
        return response()->json([
            'biodegradable' => $biodegradableCount,
            'residual' => $residualCount,
        ]);
    }

    public function barData()
    {
        $currentYear = now()->year;
        $months = [];
        $residualData = [];
        $biodegradableData = [];

        // Loop through all months from January (1) to December (12)
        for ($month = 1; $month <= 12; $month++) {
            // Get the zero-padded month and two-digit year (e.g., "01/24" for January 2024)
            $formattedMonthYear = str_pad($month, 2, '0', STR_PAD_LEFT) . '/' . substr($currentYear, -2);
            $months[] = $formattedMonthYear;

            // Get data for the current month
            $dataForMonth = WasteComposition::whereMonth('collection_date', $month)
                ->whereYear('collection_date', $currentYear) // Ensure to use collection_date here
                ->selectRaw("
                    SUM(CASE WHEN waste_type = 'Residual' THEN metrics ELSE 0 END) as residual,
                    SUM(CASE WHEN waste_type = 'Biodegradable' THEN metrics ELSE 0 END) as biodegradable
                ")
                ->first();

            // Append the data to the arrays (default to 0 if no data exists)
            $residualData[] = $dataForMonth->residual ?? 0;
            $biodegradableData[] = $dataForMonth->biodegradable ?? 0;
        }

        // Return the data as a JSON response for the chart
        return response()->json([
            'months' => $months, // Months in MM/YY format
            'residual' => $residualData,
            'biodegradable' => $biodegradableData,
        ]);
    }

    public function getBarangay()
    {
        $barangays = Barangay::get(['id', 'area_name']);
        return response()->json(['barangays' => $barangays]);
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
        $request->validate([
            'brgy_id' => 'required|exists:barangays,id',
            'waste_type' => 'required|string',
            'metrics' => 'required|string',
        ]);

        $userId = Auth::id();
        $currentDate = now();
        $currentDateFormatted = $currentDate->format('Y-m-d'); // Format the date for comparison

        // Create the WasteComposition record
        WasteComposition::create(array_merge(
            $request->all(),
            ['user_id' => $userId],
            ['collection_date' => $currentDate]
        ));

        // Update CollectionSchedule status to "Finished" based on matching criteria
        CollectionSchedule::where('user_id', $userId)
            ->where('brgy_id', $request->input('brgy_id'))
            ->whereDate('scheduled_date', $currentDateFormatted) // Use whereDate for Y-m-d comparison
            ->update(['status' => 'Finished']);

        return response()->json(['message' => 'Waste composition successfully added and collection status updated to Finished.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteComposition $wasteComposition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wasteComposition = WasteComposition::findOrFail($id);
        return response()->json(['wasteComposition' => $wasteComposition]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brgy_id' => 'required|exists:barangays,id',
            'waste_type' => 'required|string',
            'metrics' => 'required|string',
        ]);

        // Find the waste composition by ID
        $wasteComposition = WasteComposition::findOrFail($id);

        // Check waste_type and assign the appropriate unit
        $metricsWithUnit = $request->input('metrics');

        if ($request->input('waste_type') === 'Biodegradable') {
            $metricsWithUnit .= ''; // Append 'sack' for Biodegradable
        } elseif ($request->input('waste_type') === 'Residual') {
            $metricsWithUnit .= ''; // Append 'kg' for Residual
        }

        $currentDate = now();

        // Update the record, merging the modified metrics
        $wasteComposition->update(array_merge(
            $request->except('metrics'), // Exclude original metrics field
            ['metrics' => $metricsWithUnit],
            ['collection_date' => $currentDate]
        ));

        return response()->json(['message' => 'Waste composition successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wasteComposition = WasteComposition::findOrFail($id);
        $wasteComposition->isDeleted = '1';
        $wasteComposition->save();

        return response()->json(['message' => 'Waste composition successfully deleted.']);
    }
}
