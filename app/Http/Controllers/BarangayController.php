<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $barangays = Barangay::orderBy('created_at', 'desc')->get();
            return response()->json(['barangays' => $barangays]);
        }

        // Otherwise, return the view (for non-AJAX requests, i.e., the initial page load)
        return view('admin.barangay.index');
    }

    public function getArchive()
    {
        $abarangays = Barangay::where('isDeleted', 2)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return response()->json(['abarangays' => $abarangays]);
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
            'municipality' => 'required|string',
            'province' => 'required|string',
            'area' => 'required|string',
            'zipcode' => 'required|digits:4',
            'captain' => 'required|string',
        ]);

        // Get the ID of the currently logged-in user
        $userId = Auth::id(); // Use Auth facade

        // Create the Barangay with the current user's ID
        Barangay::create(array_merge($request->all(), ['user_id' => $userId]));

        return response()->json(['message' => 'Barangay successfully added.']);
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
        $barangay = Barangay::findOrFail($id);
        return response()->json(['barangay' => $barangay]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'municipality' => 'required|string',
            'province' => 'required|string',
            'area' => 'required|string',
            'zipcode' => 'required|digits:4',
            'captain' => 'required|string',
        ]);

        $barangay = Barangay::findOrFail($id);
        $barangay->update($request->all());

        return response()->json(['message' => 'Barangay updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangay = Barangay::findOrFail($id);
        $barangay->isDeleted = '1';
        $barangay->save();

        return response()->json(['message' => 'Barangay deleted successfully.']);
    }

    public function archive(string $id)
    {
        $barangay = Barangay::findOrFail($id);
        $barangay->isDeleted = '2';
        $barangay->save();

        return response()->json(['message' => 'Barangay archived successfully.']);
    }

    public function restore(string $id)
    {
        $barangay = Barangay::findOrFail($id);
        $barangay->isDeleted = '0';
        $barangay->save();

        return response()->json(['message' => 'Barangay restored successfully.']);
    }
}
