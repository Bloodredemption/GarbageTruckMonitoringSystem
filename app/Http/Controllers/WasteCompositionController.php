<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\WasteComposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('driver.waste-composition.index');
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

        return view('admin.waste-composition.index');
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
