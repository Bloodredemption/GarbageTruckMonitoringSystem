<?php

namespace App\Http\Controllers;

use App\Models\WasteComposition;
use App\Models\WasteConversion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WasteConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $wasteConversions = WasteConversion::whereIn('status', ['Pending', 'Ongoing', 'Finished'])
                            ->where('isDeleted', '0')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteConversions' => $wasteConversions]);
        }

        $wasteConversions = WasteConversion::whereIn('status', ['Pending', 'Ongoing', 'Finished'])
                            ->where('isDeleted', '0')
                            ->orderBy('created_at', 'desc')
                            ->get();

        // Fetch the total metrics for the waste_type "Recyclable"
        $totalRecyclableMetrics = WasteComposition::where('waste_type', 'Recyclable')
                            ->where('isDeleted', '0')
                            ->sum('metrics');

        return view('landfill.waste-conversions.index', compact('wasteConversions', 'totalRecyclableMetrics'));
    }

    public function fetchTotalConv(Request $request) 
    {
        $wasteType = $request->input('waste_type');

        $totalRecyclableMetrics = WasteComposition::where('waste_type', $wasteType)
                            ->where('isDeleted', '0')
                            ->sum('metrics');

        return response()->json(['totalRecyclableMetrics' => $totalRecyclableMetrics]);
    }

    public function admin_index()
    {
        if (request()->ajax()) {
            $wasteConversions = WasteConversion::where('isDeleted', '0')
                ->orderBy('created_at', 'desc')
                ->get();
            
            return response()->json(['wasteConversions' => $wasteConversions]);
        }

        $wasteConversions = WasteConversion::where('isDeleted', '0')
            ->orderBy('created_at', 'desc')
            ->get();

        // Pass data to the view
        return view('admin.waste-conversion.index', compact('wasteConversions'));
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
        
        $biodegradableCount = WasteConversion::where('waste_type', 'Biodegradable')
            ->whereBetween(DB::raw('DATE(start_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        $residualCount = WasteConversion::where('waste_type', 'Residual')
            ->whereBetween(DB::raw('DATE(start_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        $recyclableCount = WasteConversion::where('waste_type', 'Recyclable')
            ->whereBetween(DB::raw('DATE(start_date)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->count();

        // Return the counts as a JSON response
        return response()->json([
            'biodegradable' => $biodegradableCount,
            'residual' => $residualCount,
            'recyclable' => $recyclableCount,
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
            $dataForMonth = WasteConversion::whereMonth('end_date', $month)
                ->whereYear('end_date', $currentYear) // Ensure to use collection_date here
                ->selectRaw("
                    SUM(CASE WHEN waste_type = 'Residual' THEN metrics ELSE 0 END) as residual,
                    SUM(CASE WHEN waste_type = 'Biodegradable' THEN metrics ELSE 0 END) as biodegradable,
                    SUM(CASE WHEN waste_type = 'Recyclable' THEN metrics ELSE 0 END) as recyclable
                ")
                ->first();

            // Append the data to the arrays (default to 0 if no data exists)
            $residualData[] = $dataForMonth->residual ?? 0;
            $biodegradableData[] = $dataForMonth->biodegradable ?? 0;
            $recyclableData[] = $dataForMonth->recyclable ?? 0;
        }

        // Return the data as a JSON response for the chart
        return response()->json([
            'months' => $months, // Months in MM/YY format
            'residual' => $residualData,
            'biodegradable' => $biodegradableData,
            'recyclable' => $recyclableData,
        ]);
    }

    public function wasteType()
    {
        $wastetype = WasteComposition::where('isDeleted', '0')->get(['id', 'waste_type']);
        return response()->json(['wastetype' => $wastetype]);
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
            'waste_type' => 'required|string',
            'conversion_method' => 'required|string',
            'metrics' => 'required|string',
            'start_date' => 'required|date',
        ]);

        $userId = Auth::id();

        $metricsWithUnit = $request->input('metrics');
        
        if ($request->input('waste_type') === 'Biodegradable') {
            $metricsWithUnit .= ''; // Append 'sack' for Biodegradable
        } elseif ($request->input('waste_type') === 'Residual') {
            $metricsWithUnit .= ''; // Append 'kg' for Residual
        }

        // Merge the metrics field with the other request data
        WasteConversion::create(array_merge(
            $request->except('metrics'), // Exclude original metrics field
            ['metrics' => $metricsWithUnit], // Add modified metrics with appropriate unit
            ['user_id' => $userId] // Add user ID
        ));

        return response()->json(['message' => 'Waste conversion successfully added.']);
    }

    public function getArchive()
    {
        $archWCov = WasteConversion::where('status', 'Archived')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return response()->json(['archWCov' => $archWCov]);
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteConversion $wasteConversion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wasteConversion = WasteConversion::findOrFail($id);
        return response()->json(['wasteConversion' => $wasteConversion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'waste_type' => 'required|string',
            'conversion_method' => 'required|string',
            'metrics' => 'required|string',
            'start_date' => 'required|date',
        ]);

        $wasteConversion = WasteConversion::findOrFail($id);

        // Check waste_type and assign the appropriate unit
        $metricsWithUnit = $request->input('metrics');

        if ($request->input('waste_type') === 'Biodegradable') {
            $metricsWithUnit .= ''; // Append 'sack' for Biodegradable
        } elseif ($request->input('waste_type') === 'Residual') {
            $metricsWithUnit .= ''; // Append 'kg' for Residual
        }

        // Update the record, merging the modified metrics
        $wasteConversion->update(array_merge(
            $request->except('metrics'), // Exclude original metrics field
            ['metrics' => $metricsWithUnit] // Add modified metrics with appropriate unit
        ));

        return response()->json(['message' => 'Waste conversion successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wasteConversion = WasteConversion::findOrFail($id);
        $wasteConversion->isDeleted = '1';
        $wasteConversion->save();

        return response()->json(['message' => 'Waste conversion successfully deleted.']);
    }

    public function finish(string $id)
    {
        $wasteConversion = WasteConversion::findOrFail($id);
        $wasteConversion->status = 'Finished';
        $wasteConversion->end_date = Carbon::now()->format('Y-m-d');
        $wasteConversion->save();

        return response()->json(['message' => 'Waste conversion finished.']);
    }

    public function restore(string $id)
    {
        $wasteConversion = WasteConversion::findOrFail($id);
        $wasteConversion->status = 'Finished';
        $wasteConversion->save();

        return response()->json(['message' => 'Waste conversion successfully restored.']);
    }

    public function archive(string $id)
    {
        $wasteConversion = WasteConversion::findOrFail($id);
        $wasteConversion->status = 'Archived';
        $wasteConversion->save();

        return response()->json(['message' => 'Waste conversion archived successfully.']);
    }

    public function importData(Request $request)
    {
        // Validate the file
        $validator = Validator::make($request->all(), [
            'importFile' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle the uploaded file
        $file = $request->file('importFile');
        $data = [];

        // Open the file and parse its content
        if (($handle = fopen($file->getPathname(), 'r')) !== false) {
            $header = null; // To store the header row

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header) {
                    // First row as the header
                    $header = $row;
                } else {
                    // Combine header and row into an associative array
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        // Process the data as needed (e.g., save to the database)
        foreach ($data as $item) {
            // Ignore rows with null values
            if (empty($item['Waste Type']) || empty($item['Conversion Method']) || empty($item['Metrics (kg)']) || empty($item['Start Date']) || empty($item['End Date']) || empty($item['Status'])) {
                continue;
            }

            // Insert into `waste_conversions` table
            WasteConversion::create([
                'waste_type' => $item['Waste Type'], // Replace with your CSV headers
                'conversion_method' => $item['Conversion Method'], // Replace with your CSV headers
                'metrics' => $item['Metrics (kg)'], // Replace with your CSV headers
                'start_date' => Carbon::createFromFormat('m/d/Y', $item['Start Date'])->format('Y-m-d'),
                'end_date' => Carbon::createFromFormat('m/d/Y', $item['End Date'])->format('Y-m-d'),
                'status' => $item['Status'], // Replace with your CSV headers
                'user_id' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['message' => 'Data Imported Successfully.']);
    }
}
