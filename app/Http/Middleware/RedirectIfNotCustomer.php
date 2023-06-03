<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotCustomer
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || (Auth::user()->role !== 'customer' && Auth::user()->role !== 'admin')) {
            return redirect('/'); // Redirect to the desired URL if the user is not a customer or an admin
        }

        return $next($request);
    }
}
