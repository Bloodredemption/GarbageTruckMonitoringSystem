<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the request is an AJAX call
        if (request()->ajax()) {
            $users = Users::all();
            return response()->json(['users' => $users]);
        }

        // Otherwise, return the view (for non-AJAX requests, i.e., the initial page load)
        return view('admin.users.index');
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
        // Validate the form data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'contact_num' => 'required|string|max:15',
            'user_type' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Build the full name
        $fullname = $request->firstname . ' ' . ($request->middle_initial ? $request->middle_initial . '. ' : '') . $request->lastname;

        // Create a new user
        Users::create([
            'fullname' => $fullname,
            'username' => $request->username,
            'contact_num' => $request->contact_num,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        // Return a JSON response (success message)
        return response()->json(['message' => 'User added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the user by ID
        $user = Users::findOrFail($id);

        // Return user data as JSON
        return response()->json([
            'user' => [
                'fullname' => $user->fullname,
                'user_type' => $user->user_type,
                'contact_num' => $user->contact_num,
                'status' => $user->status == 'active' ? 'Active' : 'Inactive',
                'created_at' => $user->created_at->format('F d, Y h:i A'),
                'updated_at' => $user->updated_at->format('F d, Y h:i A'),
                'username' => $user->username,
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Users::find($id);
        return response()->json(['user' => $user]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id, // Ensure unique username except for current user
            'contact_num' => 'required|string|max:15',
            'user_type' => 'required|string|max:255',
        ]);

        // Find the user by ID
        $user = Users::findOrFail($id);

        // Update the user's full name and other attributes
        $user->fullname = $request->firstname . ' ' . ($request->middle_initial ? $request->middle_initial . '. ' : '') . $request->lastname;
        $user->username = $request->username;
        $user->contact_num = $request->contact_num;
        $user->user_type = $request->user_type;

        // Save changes
        $user->save();

        // Return a JSON response (success message)
        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Users::find($id);
        $user->status = 'deleted';
        $user->save();

        return response()->json(['message' => 'User deleted successfully']);
    }
}