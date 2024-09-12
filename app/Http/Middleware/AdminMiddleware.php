<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminMiddleware
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
            // Check if the user exists in the admins table and the is_admin column in admins table is 1
            $isAdminInAdminsTable = Admin::where('id', Auth::id())->where('is_admin', 1)->exists();

            if ($isAdminInAdminsTable) {
                return $next($request);  // Allow access if the user is an admin in the admins table
            }
        }

        // Redirect to admin login if not an admin in the admins table
        return redirect()->route('admin.login');
    }
}
