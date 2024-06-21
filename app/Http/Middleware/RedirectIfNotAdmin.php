<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Pastikan untuk mengimpor model Admin

class RedirectIfNotAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and admin
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user() instanceof Admin) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login admin
        return redirect()->route('loginadmin')->with('errorMsg', 'Anda tidak memiliki izin untuk mengakses halaman admin.');
    }
}
