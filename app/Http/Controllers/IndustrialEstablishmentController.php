<?php

namespace App\Http\Controllers;

use App\Models\IndustrialEstablishment;
use App\Models\Barangay;
use Illuminate\Http\Request;

class IndustrialEstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $ie = IndustrialEstablishment::orderBy('created_at', 'desc')
                            ->with('barangay:id,area_name')
                            ->get();
            return response()->json(['ie' => $ie]);
        }

        $ie = IndustrialEstablishment::orderBy('created_at', 'desc')
                            ->with('barangay:id,area_name')
                            ->get();

        return view('admin.industrial-establishments.index', compact('ie'));
    }

    public function getBrgy()
    {
        $brgy = Barangay::where('isDeleted', '0')
                        ->get(['id', 'area_name']);
        return response()->json(['brgy' => $brgy]);
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
            'name' => 'required|string',
            'brgy_id' => 'required|exists:barangays,id',
            'type' => 'required|string',
        ]);

        $ie = new IndustrialEstablishment($request->all());
        $ie->save();

        return response()->json(['message' => 'Industrial Establishment successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(IndustrialEstablishment $industrialEstablishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ie = IndustrialEstablishment::findOrFail($id);
        return response()->json(['ie' => $ie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'brgy_id' => 'required|exists:barangays,id',
            'type' => 'required|string',
        ]);

        $ie = IndustrialEstablishment::findOrFail($id);
        $ie->update($request->all());

        return response()->json(['message' => 'Industrial Establishment successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustrialEstablishment $industrialEstablishment)
    {
        //
    }
}
