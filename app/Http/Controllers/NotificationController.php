<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use App\Events\NotificationSent;
use App\Models\Messages;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $notifications = Notification::with('user:id,fullname')
                                ->whereIn('status', ['sent', 'read'])
                                ->orderBy('created_at', 'desc')
                                ->get();
            return response()->json(['notifications' => $notifications]);
        }

        $notifications = Notification::with('user:id,fullname')
                                ->whereIn('status', ['sent', 'read'])
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('admin.notifications.index', compact('notifications'));
    }

    public function driver_index(Request $request)
    {
        $messages = Messages::with(['sender', 'receiver'])
            ->select('messages.*')
            ->join(
                \DB::raw('(SELECT MAX(id) as latest_id FROM messages WHERE user_id = '.auth()->id().' GROUP BY receiver_id) as latest_messages'),
                'messages.id',
                '=',
                'latest_messages.latest_id'
            )
            ->orderBy('created_at', 'desc')
            ->get();

        // If the request is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'messages' => $messages
            ]);
        }

        // If it's not an AJAX request, return the regular view
        return view('driver.notifications.index', compact('messages'));
    }

    public function getArchive()
    {
        $anotifs = Notification::with('user:id,fullname')
            ->where('status', 'archive')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return response()->json(['anotifs' => $anotifs]);
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

        $notification = Notification::create($request->all());

        // Trigger the event with the notification message
        event(new NotificationSent($notification->notification_msg));

        return response()->json(['message' => 'Notification successfully added.']);
    }

    public function markAllAsRead()
    {
        $unreadNotifications = Notification::where('status', 'sent')->count();

        if ($unreadNotifications > 0) {
            // Update the status of all unread notifications to 'read'
            Notification::where('status', 'sent')->update(['status' => 'read']);

            return response()->json(['success' => true, 'message' => 'All notifications marked as read']);
        } else {
            // All notifications are already marked as read
            return response()->json(['success' => false, 'message' => 'All notifications are already marked as read']);
        }
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

        event(new NotificationSent($notification->notification_msg));
        
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

    public function getNotifications()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Fetch notifications from the database where the user_id matches the logged-in user
        $notifications = Notification::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')  // Optional: Order by most recent
                            ->get(['id', 'notification_msg', 'created_at']);  // Specify the columns to fetch

        // Return as JSON
        return response()->json($notifications);
    }

    public function archive(string $id)
    {
        $notifications = Notification::findOrFail($id);
        $notifications->status = 'archive';
        $notifications->save();

        return response()->json(['message' => 'Notification archived successfully.']);
    }

    public function restore(string $id)
    {
        $notifications = Notification::findOrFail($id);
        $notifications->status = 'sent';
        $notifications->save();

        return response()->json(['message' => 'Notification restored successfully.']);
    }
}
