<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the user is authenticated with the 'wajibpajak' guard
        if (Auth::guard('wajibpajak')->check()) {
            // Redirect to the home route if logged in with 'wajibpajak'
            return route('home');
        }

        return $request->expectsJson() ? null : route('login');
    }
}
