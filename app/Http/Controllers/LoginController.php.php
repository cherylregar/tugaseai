<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lakukan proses autentikasi
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Jika autentikasi sukses, redirect ke halaman landing
            return redirect()->route('landingpage');
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
