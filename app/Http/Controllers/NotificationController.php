<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Users;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $notifications = Notification::with('user:id,fullname')
                                ->orderBy('created_at', 'desc')
                                ->get();
            return response()->json(['notifications' => $notifications]);
        }

        return view('admin.notifications.index');
    }

    public function getDrivers()
    {
        $drivers = Users::where('user_type', 'driver')->get(['id', 'fullname']);
        return response()->json(['drivers' => $drivers]);
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
            'notification_msg' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Notification::create($request->all());

        return response()->json(['message' => 'Notification successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notification = Notification::findOrFail($id);
        return response()->json(['notification' => $notification]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'notification_msg' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($request->all());

        return response()->json(['message' => 'Notification successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->status = 'deleted';
        $notification->save();

        return response()->json(['message' => 'Notification successfully deleted.']);
    }

    public function sendNotification($id)
    {
        try {
            // Find the notification by ID
            $notification = Notification::findOrFail($id);

            $notification->status = 'sent'; // Set notification status to 'sent'
            $notification->save(); // Save changes

            return response()->json([
                'message' => 'Notification has been sent successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error sending notification: ' . $e->getMessage()
            ], 500);
        }
    }
}
