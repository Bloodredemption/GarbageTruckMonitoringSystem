<?php

namespace App\Http\Controllers;

use App\Models\DumpTruck;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DumpTruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $dumpTrucks = DumpTruck::whereIn('status', ['active', 'inactive'])
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['dumpTrucks' => $dumpTrucks]);
        }

        return view('admin.dump-trucks.index');
    }

    public function getArchive()
    {
        $adumpTrucks = DumpTruck::where('status', 'archive')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return response()->json(['adumpTrucks' => $adumpTrucks]);
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
            'brand' => 'required|string',
            'model' => 'required|string',
            'status' => 'required|string',
        ]);

        DumpTruck::create($request->all());

        return response()->json(['message' => 'Dump truck successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(DumpTruck $dumpTruck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dumpTruck = DumpTruck::findOrFail($id);
        return response()->json(['dumpTruck' => $dumpTruck]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'status' => 'required|string',
        ]);

        $dumpTruck = DumpTruck::findOrFail($id);
        $dumpTruck->update($request->all());

        return response()->json(['message' => 'Dump truck successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dumpTruck = DumpTruck::findOrFail($id);
        $dumpTruck->status = 'deleted';
        $dumpTruck->save();

        return response()->json(['message' => 'Dump truck successfully deleted.']);
    }

    public function archive(string $id)
    {
        $dumpTruck = DumpTruck::findOrFail($id);
        $dumpTruck->status = 'archive';
        $dumpTruck->save();

        return response()->json(['message' => 'Dump truck archived successfully.']);
    }

    public function restore(string $id)
    {
        $dumpTruck = DumpTruck::findOrFail($id);
        $dumpTruck->status = 'active';
        $dumpTruck->save();

        return response()->json(['message' => 'Dump truck restored successfully.']);
    }
}
