<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Users::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            
            $role = match($user->user_type) {
                'admin' => 'Administrator Account',
                'landfill' => 'Landfill Operator',
                'driver' => 'Driver Account',
                default => 'Unknown Role'
            };

            // Store user name and role in session
            session([
                'user_name' => $user->fullname,
                'user_role' => $role,
                'user_type' => $user->user_type
            ]);
            
            if ($user->status == 'inactive') {
                $user->status = 'active';
                $user->save();
            }

            switch ($user->user_type) {
                case 'admin':
                    return redirect()->route('dashboard');
                case 'landfill':
                    return redirect()->route('lf.dashboard');
                case 'driver':
                    return redirect()->route('d.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['loginError' => 'Unauthorized access.']);
            }
        }

        return back()->withErrors([
            'loginError' => 'The username or password is incorrect.',
        ])->withInput();
    }

    public function showLoginForm()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // Get the authenticated user's ID
            $user = Auth::user();
            
            // Check the user_type in the Users model
            if ($user->user_type == 'admin') {
                // Redirect to the admin dashboard
                return redirect()->route('dashboard');
            } elseif ($user->user_type == 'driver') {
                // Redirect to the driver dashboard
                return redirect()->route('d.dashboard');
            } elseif ($user->user_type == 'landfill') {
                // Redirect to the landfill dashboard
                return redirect()->route('lf.dashboard');
            }
        }

        // If the user is not authenticated, show the login form
        return view('auth.login');
    }
}
