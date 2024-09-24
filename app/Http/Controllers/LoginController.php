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
        return view('auth.login');
    }
}
