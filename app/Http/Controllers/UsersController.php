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
        $users = Users::whereIn('status', ['active', 'inactive'])
                  ->orderBy('created_at', 'asc')
                  ->get();

        return view('admin.users.index', compact('users'));
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
            'add_firstname' => 'required|string|max:255',
            'add_middle_initial' => 'nullable|string|max:1',
            'add_lastname' => 'required|string|max:255',
            'add_username' => 'required|string|max:255|unique:users,username',
            'add_contact_num' => 'required|string|max:15',
            'add_user_type' => 'required|string|max:255',
            'add_password' => 'required|string|min:6|confirmed',
        ]);

        $fullname = $request->firstname . ' ' . ($request->middle_initial ? $request->middle_initial . '. ' : '') . $request->lastname;

        // Create a new user
        Users::create([
            'add_fullname' => $fullname,
            'add_username' => $request->username,
            'add_contact_num' => $request->contact_num,
            'add_user_type' => $request->user_type,
            'add_password' => Hash::make($request->password),
        ]);

        // Redirect back to the user list with a success message
        return redirect('/admin/users')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $user = Users::findOrFail($id);

        return response()->json($user);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'edit_firstname' => 'required|string|max:255',
            'edit_middle_initial' => 'nullable|string|max:1',
            'edit_lastname' => 'required|string|max:255',
            'edit_username' => 'required|string|max:255|unique:users,username,' . $id,
            'edit_contact_num' => 'required|string|max:15',
            'edit_user_type' => 'required|in:admin,landfill,driver',
            'edit_password' => 'nullable|string|min:8|confirmed',
        ]);

        // If validation fails, return errors as JSON response
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Find the user
        $user = Users::findOrFail($id);

        // Update the user fields
        $user->firstname = $request->firstname;
        $user->middle_initial = $request->middle_initial;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->contact_num = $request->contact_num;
        $user->user_type = $request->user_type;

        // Update the password only if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Save the changes
        $user->save();

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'user' => $user,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}