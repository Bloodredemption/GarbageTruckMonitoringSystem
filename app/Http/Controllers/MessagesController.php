<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch latest messages per receiver, avoiding duplicates
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
        return view('partials.header', compact('messages'));
    }

    public function getConversation($receiver_id)
    {
        // Fetch conversation based on sender and receiver
        $messages = Messages::where(function($query) use ($receiver_id) {
            $query->where('user_id', auth()->id())
                ->where('receiver_id', $receiver_id);
        })
        ->orWhere(function($query) use ($receiver_id) {
            $query->where('user_id', $receiver_id)
                ->where('receiver_id', auth()->id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

        return response()->json([
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Save the message to the database
        $message = new Messages();
        $message->user_id = auth()->id();  // Assuming the sender is authenticated
        $message->receiver_id = $request->receiver_id;  // You'll need to pass the receiver_id with the AJAX request
        $message->message = $request->message;
        $message->save();

        // Return a response (you can send additional data if necessary)
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function getMessages()
    {
        // Fetch latest messages per receiver, avoiding duplicates
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

        // Format message time as human-readable format
        $messages = $messages->map(function ($message) {
            $message->formatted_time = \Carbon\Carbon::parse($message->created_at)->diffForHumans();
            return $message;
        });

        // Return the messages in JSON format
        return response()->json(['messages' => $messages]);
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
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
