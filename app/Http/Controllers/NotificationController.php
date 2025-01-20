<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use App\Events\NotificationSent;
use App\Models\ResidentsConcerns;

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

    public function driver_index()
    {
        if (request()->ajax()) {
            $notifications = Notification::with('user:id,fullname')
                                ->whereIn('status', ['sent', 'read'])
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->map(function ($notification) {
                                    $notification->time_ago = Carbon::parse($notification->created_at)->diffForHumans();
                                    return $notification;
                                });

            return response()->json(['notifications' => $notifications]);
        }

        $notifications = Notification::with('user:id,fullname')
            ->whereIn('status', ['sent', 'read'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($notification) {
                // Extract the ID from the notification_msg field
                preg_match('/\d+/', $notification->notification_msg, $matches);
                $residentsConcernId = $matches[0] ?? null;

                // Fetch the status from the residents_concerns model
                $residentsConcernStatus = null;
                if ($residentsConcernId) {
                    $residentsConcernStatus = ResidentsConcerns::where('id', $residentsConcernId)->value('status');
                }

                // Add the calculated status and time_ago to the notification
                $notification->time_ago = Carbon::parse($notification->created_at)->diffForHumans();
                $notification->residents_concern_status = $residentsConcernStatus;

                return $notification;
            });

        // Broadcast the notifications
        broadcast(new NotificationSent($notifications));

        // Return the notifications to the view
        return view('driver.notifications.index', compact('notifications'));
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

    public function markAsRead(string $id)
    {
        $notification = Notification::find($id);

        if ($notification && $notification->status == 'sent') {
            // Update the status of the notification to 'read'
            $notification->update(['status' => 'read']);

            return response()->json(['success' => true, 'message' => 'Marked as read']);
        } else {
            // Notification not found or already marked as read
            // return response()->json(['success' => false, 'message' => 'Notification not found or already marked as read']);
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