<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Fetch the currently authenticated user's data by ID
        $user = Users::select('fullname', 'contact_num', 'user_type')
                    ->where('id', $userId)
                    ->first();

        return view('driver.account.index', compact('user'));
    }

    public function change_pass()
    {
        $userId = Auth::id();

        // Fetch the currently authenticated user's data by ID
        $user = Users::select('id')
                    ->where('id', $userId)
                    ->first();

        return view('driver.change-password.index', compact('user'));
    }

    public function help()
    {
        return view('driver.help.index');
    }

    public function personalinfo()
    {
        $userId = Auth::id();
        $user = Users::select('fullname', 'contact_num', 'user_type', 'username')
                    ->where('id', $userId)
                    ->first();

        return view('driver.personal-information.index', compact('user'));
    }

    public function personalinfoedit()
    {
        $userId = Auth::id();
        $user = Users::select('id', 'fullname', 'contact_num', 'user_type', 'username')
                    ->where('id', $userId)
                    ->first();

        return view('driver.personal-information.edit', compact('user'));
    }

    public function personalinfoedit_update(Request $request, string $id)
    {
        $userId = Auth::id();
        $user = Users::find($userId);

        // Basic validation for required fields
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'contact_num' => 'required|string|max:15',
        ]);

        // Update user details
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->contact_num = $request->input('contact_num');

        // Save the user data
        $user->save();

        // Redirect back with a success message
        // return redirect('/driver/account/personal-information')->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request, string $id)
    {
        $userId = Auth::id();

        // Check if the authenticated user's ID matches the ID in the request
        if ($userId != $id) {
            return response()->json(['message' => 'Unauthorized access.'], 403);
        }

        // Validate the password input
        $request->validate([
            'password' => 'required|string', // Ensure passwords match if using confirmation
        ]);

        $user = Users::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Update the password
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'Password updated successfully!'], 200);
    }

    public function admin_index() {
        $userId = Auth::id();

        // Fetch the currently authenticated user's data by ID
        $user = Users::select('id' ,'fullname', 'contact_num', 'user_type', 'username')
                    ->where('id', $userId)
                    ->first();

        return view('admin.profile.index', compact('user'));
    }

    public function landfill_index() {
        $userId = Auth::id();

        // Fetch the currently authenticated user's data by ID
        $user = Users::select('id' ,'fullname', 'contact_num', 'user_type', 'username')
                    ->where('id', $userId)
                    ->first();

        return view('landfill.profile.index', compact('user'));
    }
    
    public function admprofileUpdate(Request $request, string $id) {
        $userId = Auth::id();
        $user = Users::find($userId);

        // Basic validation for required fields
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'contact_num' => 'required|string|max:15',
        ]);

        // Update user details
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->contact_num = $request->input('contact_num');

        // Save the user data
        $user->save();
    }

    public function admchangePassword(Request $request, string $id)
    {
        $userId = Auth::id();

        // Check if the authenticated user's ID matches the ID in the request
        if ($userId != $id) {
            return response()->json(['message' => 'Unauthorized access.'], 403);
        }

        // Validate the password input
        $request->validate([
            'password' => 'required|string', // Ensure passwords match if using confirmation
        ]);

        $user = Users::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Update the password
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'Password updated successfully!'], 200);
    }

    public function admin_help() {
        return view('admin.help.index');
    }
}
