<?php

namespace App\Http\Controllers;

use App\Models\WasteComposition;
use App\Models\WasteConversion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WasteConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $wasteConversions = WasteConversion::orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteConversions' => $wasteConversions]);
        }

        $wasteConversions = WasteConversion::orderBy('created_at', 'desc')
                            ->get();

        return view('landfill.waste-conversions.index', compact('wasteConversions'));
    }

    public function admin_index()
    {
        if (request()->ajax()) {
            $wasteConversions = WasteConversion::orderBy('created_at', 'desc')
                ->get();
            
            return response()->json(['wasteConversions' => $wasteConversions]);
        }

        $wasteConversions = WasteConversion::orderBy('created_at', 'desc')
        ->get();

        // Pass data to the view
        return view('admin.waste-conversion.index', compact('wasteConversions'));
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
            'end_date' => 'required|date',
        ]);

        $userId = Auth::id();

        $metricsWithUnit = $request->input('metrics');
        
        if ($request->input('waste_type') === 'Biodegradable') {
            $metricsWithUnit .= ' sack'; // Append 'sack' for Biodegradable
        } elseif ($request->input('waste_type') === 'Residual') {
            $metricsWithUnit .= ' kg'; // Append 'kg' for Residual
        }

        // Merge the metrics field with the other request data
        WasteConversion::create(array_merge(
            $request->except('metrics'), // Exclude original metrics field
            ['metrics' => $metricsWithUnit], // Add modified metrics with appropriate unit
            ['user_id' => $userId] // Add user ID
        ));

        return response()->json(['message' => 'Waste conversion successfully added.']);
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
            'end_date' => 'required|date',
        ]);

        $wasteConversion = WasteConversion::findOrFail($id);

        // Check waste_type and assign the appropriate unit
        $metricsWithUnit = $request->input('metrics');

        if ($request->input('waste_type') === 'Biodegradable') {
            $metricsWithUnit .= ' sack'; // Append 'sack' for Biodegradable
        } elseif ($request->input('waste_type') === 'Residual') {
            $metricsWithUnit .= ' kg'; // Append 'kg' for Residual
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
}
