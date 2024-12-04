<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $events = Event::orderBy('created_at', 'desc')
                            ->get();
            return response()->json(['events' => $events]);
        }

        $events = Event::orderBy('created_at', 'desc')
                            ->get();

        return view('admin.events.index', compact('events'));
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
            'date' => 'required',
            'description' => 'required|string',
        ]);

        $event = Event::create($request->all());

        return response()->json(['message' => 'Event successfully created.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return response()->json(['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required',
            'description' => 'required|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return response()->json(['message' => 'Event successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
