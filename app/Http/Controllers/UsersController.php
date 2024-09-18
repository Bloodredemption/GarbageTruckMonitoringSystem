<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

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
            'firstname' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'contact_num' => 'required|string|max:15',
            'user_type' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $fullname = $request->firstname . ' ' . ($request->middle_initial ? $request->middle_initial . '. ' : '') . $request->lastname;

        // Create a new user
        Users::create([
            'fullname' => $fullname,
            'username' => $request->username,
            'contact_num' => $request->contact_num,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}