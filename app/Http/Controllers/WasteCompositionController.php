<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
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
        if (request()->ajax()) {
            $userId = Auth::id();

            $wasteCompositions = WasteComposition::with('brgy:id,name')
                            ->where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteCompositions' => $wasteCompositions]);
        }

        $userId = Auth::id();

        $wasteCompositions = WasteComposition::with('brgy:id,name')
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('driver.waste-composition.index', compact('wasteCompositions'));
    }

    public function admin_index()
    {
        if (request()->ajax()) {
            $wasteCompositions = WasteComposition::with('brgy:id,name')
                            ->with('user:id,user_type')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteCompositions' => $wasteCompositions]);
        }

        $wasteCompositions = WasteComposition::with('brgy:id,name')
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
        $barangays = Barangay::get(['id', 'name', 'area']);
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
            'collection_date' => 'required|date',
            'metrics' => 'required|string',
        ]);

        $userId = Auth::id();

        // Check waste_type and assign the appropriate unit
        $metricsWithUnit = $request->input('metrics');
        
        if ($request->input('waste_type') === 'Biodegradable') {
            $metricsWithUnit .= ''; // Append 'sack' for Biodegradable
        } elseif ($request->input('waste_type') === 'Residual') {
            $metricsWithUnit .= ''; // Append 'kg' for Residual
        }

        // Merge the metrics field with the other request data
        WasteComposition::create(array_merge(
            $request->except('metrics'), // Exclude original metrics field
            ['metrics' => $metricsWithUnit], // Add modified metrics with appropriate unit
            ['user_id' => $userId] // Add user ID
        ));

        return response()->json(['message' => 'Waste composition successfully added.']);
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
            'collection_date' => 'required|date',
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

        // Update the record, merging the modified metrics
        $wasteComposition->update(array_merge(
            $request->except('metrics'), // Exclude original metrics field
            ['metrics' => $metricsWithUnit] // Add modified metrics with appropriate unit
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
