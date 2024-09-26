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
            $wasteConversions = WasteConversion::with('waste_comp:id,waste_type')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteConversions' => $wasteConversions]);
        }

        return view('landfill.waste-conversions.index');
    }

    public function admin_index()
    {
        if (request()->ajax()) {
            $wasteConversions = WasteConversion::with('waste_comp:id,waste_type')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteConversions' => $wasteConversions]);
        }

        return view('admin.waste-conversion.index');
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
            'waste_comp_id' => 'required|exists:waste_compositions,id',
            'conversion_method' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $userId = Auth::id();

        WasteConversion::create(array_merge($request->all(), ['user_id' => $userId]));

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
            'waste_comp_id' => 'required|exists:waste_compositions,id',
            'conversion_method' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $wasteConversion = WasteConversion::findOrFail($id);
        $wasteConversion->update($request->all());

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
