<?php

namespace App\Http\Controllers;

use App\Models\WasteComposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WasteCollectionController extends Controller
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
                            ->where('isDeleted', 0)
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['wasteCompositions' => $wasteCompositions]);
        }

        $userId = Auth::id();
            
        $wasteCompositions = WasteComposition::with('brgy:id,name')
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('landfill.waste-collection.index', compact('wasteCompositions'));
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
