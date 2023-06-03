<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user has the admin role
            if (Auth::user()->role === 'admin') {
                return $next($request);
            }
        }

        // If the user is not authenticated or does not have the admin role,
        // redirect them to a designated unauthorized page or perform any other desired action
        return redirect()->route('unauthorized');
    }
}
