<?php

namespace App\Http\Controllers;

use App\Models\TruckLocation;
use Illuminate\Http\Request;
use App\Models\CollectionSchedule;
use Carbon\Carbon;

class TruckLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $currentDayName = Carbon::today()->format('l'); // Example output: "Friday"
        $currentDateFormatted = Carbon::today()->format('M. j, Y'); // Example output: "Nov. 9, 2024"

        $schedules = CollectionSchedule::whereDate('scheduled_date', $today)
                    ->with('barangay')
                    ->select('brgy_id', 'scheduled_time', 'status')
                    ->get();

        return view('admin.live-tracking.index', compact('schedules', 'currentDayName', 'currentDateFormatted'));
    }

    public function getLatestLocation()
    {
        // Retrieve the latest location record
        $location = TruckLocation::latest()->first();

        // If location data exists, return it; otherwise, return an error message
        if ($location) {
            return response()->json([
                'latitude' => $location->latitude,
                'longitude' => $location->longitude
            ]);
        } else {
            return response()->json(['error' => 'No location data available'], 404);
        }
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
    public function show(TruckLocation $truckLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TruckLocation $truckLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TruckLocation $truckLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TruckLocation $truckLocation)
    {
        //
    }
}
