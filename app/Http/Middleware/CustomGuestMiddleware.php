<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomGuestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->isEmployee()) {
                return redirect()->intended('/employee/index');
            } elseif ($user->isCaptain()) {
                return redirect()->intended('/captain/index');
            } else {
                abort(403);
            }
        }

        return $next($request); // Proceed if user is not authenticated
    }
}
