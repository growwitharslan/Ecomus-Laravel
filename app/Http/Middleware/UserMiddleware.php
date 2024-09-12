<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            return $next($request);  // Allow access if user is logged in
        }

        // Redirect to user login if not logged in
        return redirect()->route('account.login');  // Change 'login' to your user login route name
    }
}
