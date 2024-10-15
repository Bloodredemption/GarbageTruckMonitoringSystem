<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\CollectionSchedule;
use App\Models\DumpTruck;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $collectionSchedules = CollectionSchedule::with('driver:id,fullname')
                            ->with('dumptruck:id,brand,model')
                            ->with('barangay:id,name')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['collectionSchedules' => $collectionSchedules]);
        }

        return view('admin.collection-schedule.index');
    }

    public function events()
    {
        $collectionSchedules = CollectionSchedule::with(['barangay', 'dumpTruck.driver'])->get();

        $events = $collectionSchedules->map(function ($schedule) {
            return [
                'id' => $schedule->id,
                'start' => $schedule->scheduled_date . 'T' . $schedule->scheduled_time, // FullCalendar requires date and time in ISO format
                'end' => $schedule->scheduled_date . 'T' . $schedule->scheduled_time, // Set the end to the same date/time to avoid spanning multiple days
                'title' => '' . $schedule->barangay->area . '',
                'allDay' => false,
                'extendedProps' => [
                    'brgy_id' => $schedule->brgy_id,
                    'dumptruck_id' => $schedule->dumptruck_id,
                    'sched_id' => $schedule->id,
                    'brgy_name' => $schedule->barangay->name,
                    'dumptruck' => $schedule->dumpTruck->brand . ' ' . $schedule->dumpTruck->model,
                ],
            ];
        });

        return response()->json($events);
    }

    // public function events()
    // {
    //     $collectionSchedules = CollectionSchedule::select('id', 'scheduled_date as start', 'scheduled_time', 'brgy_id', 'dumptruck_id')
    //                                             ->get();

    //     $events = collect();

    //     // Loop through each schedule and create events for the same day of each month
    //     foreach ($collectionSchedules as $schedule) {
    //         $date = \Carbon\Carbon::parse($schedule->start);

    //         // Add the event for the current month
    //         $events->push([
    //             'id' => $schedule->id,
    //             'start' => $date->format('Y-m-d') . 'T' . $schedule->scheduled_time,
    //             'end' => $date->format('Y-m-d') . 'T' . $schedule->scheduled_time,
    //             'title' => '' . $schedule->barangay->name . '',
    //             'allDay' => false,
    //             'extendedProps' => [
    //                 'brgy_id' => $schedule->brgy_id,
    //                 'dumptruck_id' => $schedule->dumptruck_id,
    //                 'sched_id' => $schedule->id,
    //                 'brgy_name' => $schedule->barangay->name,
    //                 'dumptruck' => $schedule->dumpTruck->brand . ' ' . $schedule->dumpTruck->model,
    //                 'driver_name' => $schedule->dumpTruck->driver->fullname,
    //             ],
    //         ]);

    //         // Repeat the event on the same day for the next X months (e.g., 6 months)
    //         for ($i = 1; $i <= 5; $i++) {
    //             $nextMonthDate = $date->copy()->addMonths($i);

    //             $events->push([
    //                 'id' => $schedule->id,
    //                 'start' => $nextMonthDate->format('Y-m-d') . 'T' . $schedule->scheduled_time,
    //                 'end' => $nextMonthDate->format('Y-m-d') . 'T' . $schedule->scheduled_time,
    //                 'title' => '' . $schedule->barangay->name . '',
    //                 'allDay' => false,
    //                 'extendedProps' => [
    //                     'brgy_id' => $schedule->brgy_id,
    //                     'dumptruck_id' => $schedule->dumptruck_id,
    //                     'sched_id' => $schedule->id,
    //                     'brgy_name' => $schedule->barangay->name,
    //                     'dumptruck' => $schedule->dumpTruck->brand . ' ' . $schedule->dumpTruck->model,
    //                     'driver_name' => $schedule->dumpTruck->driver->fullname,
    //                 ],
    //             ]);
    //         }
    //     }

    //     return response()->json($events);
    // }

    public function getBrgy()
    {
        $brgy = Barangay::where('isDeleted', '0')
                        ->get(['id', 'name', 'area']);
        return response()->json(['brgy' => $brgy]);
    }

    public function getDumptruck()
    {
        $dt = DumpTruck::whereIn('status', ['active', 'inactive'])
                        ->get(['id', 'brand', 'model']);
        return response()->json(['dt' => $dt]);
    }

    public function getDriver()
    {
        $driver = Users::where('user_type', 'driver')
                        ->where('status', 'active')
                        ->get(['id', 'fullname']);
        return response()->json(['driver' => $driver]);
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
            'dumptruck_id' => 'required|exists:dump_trucks,id',
            'user_id' => 'required|exists:users,id',
            'scheduled_date' => 'required|string',
            'scheduled_time' => 'required|string',
        ]);

        CollectionSchedule::create($request->all());

        return response()->json(['message' => 'Collection schedule successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(CollectionSchedule $collectionSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collectionSchedule = CollectionSchedule::find($id);
        return response()->json(['collectionSchedule' => $collectionSchedule]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brgy_id' => 'required|exists:barangays,id',
            'dumptruck_id' => 'required|exists:dump_trucks,id',
            'user_id' => 'required|exists:users,id',
            'scheduled_date' => 'required|string',
            'scheduled_time' => 'required|string',
        ]);
        
        $collectionSchedule = CollectionSchedule::findOrFail($id);
        $collectionSchedule->update($request->all());

        return response()->json(['message' => 'Collection schedule successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collectionSchedule = CollectionSchedule::findOrFail($id);
        $collectionSchedule->status = 'deleted';
        $collectionSchedule->save();

        return response()->json(['message' => 'Collection schedule successfully deleted.']);
    }
}
