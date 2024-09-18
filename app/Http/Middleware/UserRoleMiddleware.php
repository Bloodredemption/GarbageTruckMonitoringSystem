<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Check the user's role
        $user = Auth::user();
        if ($user->user_type !== $role) {
            // Optionally redirect to an unauthorized page or home page
            return redirect()->route('login')->withErrors('Unauthorized access.');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
