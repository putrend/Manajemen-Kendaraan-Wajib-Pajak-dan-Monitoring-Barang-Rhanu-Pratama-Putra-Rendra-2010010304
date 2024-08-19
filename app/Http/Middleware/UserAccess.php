<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\UserController as Role;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        // Separate user role access from routes
        $userType = explode('|', $userType);

        // Divide user role from routes and actual role user, and get the same role only
        $role = Arr::only(Role::roleToArray(), $userType);
        // Check if user role is exists in group role role and redirect
        if (array_key_exists(auth()->user()->role, $role)) {
            return $next($request);
        } else if (auth()->guard('wajibpajak')->check() && array_key_exists('4', $role)) {
            return $next($request);
        }

        return redirect('/home')->with('fail_access', 'Gagal Mengakses Halaman, Anda Tidak Mempunyai Akses !');
    }
}
