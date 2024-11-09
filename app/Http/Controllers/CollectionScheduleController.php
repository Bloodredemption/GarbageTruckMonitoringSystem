<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\CollectionSchedule;
use App\Models\DumpTruck;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
                            ->with('barangay:id,area_name')
                            ->orderBy('created_at', 'desc')
                            ->get();
        
            return response()->json(['collectionSchedules' => $collectionSchedules]);
        }

        $collectionSchedules = CollectionSchedule::with('driver:id,fullname')
                            ->with('dumptruck:id,brand,model')
                            ->with('barangay:id,area_name')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin.collection-schedule.index', compact('collectionSchedules'));
    }

    public function checkConflict(Request $request)
    {
        $conflict = CollectionSchedule::where('scheduled_date', $request->scheduled_date)
                    ->where('scheduled_time', $request->scheduled_time)
                    ->exists();

        return response()->json(['conflict' => $conflict]);
    }

    public function events()
    {
        $collectionSchedules = CollectionSchedule::with(['barangay', 'dumpTruck.driver'])->get();

        $events = $collectionSchedules->map(function ($schedule) {
            // Create a DateTime object for the start time
            $startDateTime = new \DateTime($schedule->scheduled_date . ' ' . $schedule->scheduled_time);
            
            // Clone the start time and add a duration (e.g., 1 hour) for the end time
            $endDateTime = (clone $startDateTime)->modify('+1 hour');

            return [
                'id' => $schedule->id,
                'start' => $startDateTime->format('Y-m-d\TH:i:s'), // Format for FullCalendar
                'end' => $endDateTime->format('Y-m-d\TH:i:s'), // End time adjusted to 1 hour later
                'title' => $schedule->barangay->area_name,
                'allDay' => false,
                'extendedProps' => [
                    'brgy_id' => $schedule->brgy_id,
                    'dumptruck_id' => $schedule->dumptruck_id,
                    'sched_id' => $schedule->id,
                    'brgy_name' => $schedule->barangay->area_name,
                    'driver_id' => $schedule->user_id,
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
                        ->get(['id', 'area_name']);
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

        $today = Carbon::today()->format('Y-m-d');
        
        // Determine the status based on the scheduled date
        $status = $request->input('scheduled_date') === $today ? 'Ongoing' : 'Pending';

        // Create a new CollectionSchedule instance and explicitly set the status
        $schedule = new CollectionSchedule($request->all());
        $schedule->status = $status; // Override any default value
        $schedule->save();

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

    public function driver_index() {
        $currentDate = Carbon::today()->toDateString();

        $schedules = CollectionSchedule::with('barangay:id,area_name')
                    ->whereDate('scheduled_date', $currentDate)
                    ->get();

        return view('driver.collection-schedule.index', compact('schedules'));
    }

    public function fetchByDate(Request $request) {
        $selectedDate = $request->input('date') ?? Carbon::today()->toDateString(); 
    
        $schedules = CollectionSchedule::with('barangay:id,area_name')
                    ->whereDate('scheduled_date', $selectedDate)
                    ->get();
    
        return response()->json(['schedules' => $schedules]);
    }
    
}
