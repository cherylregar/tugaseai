<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    // Show admin login form
    public function showLoginForm()
    {
        return view('loginadmin');
    }

    // Process admin login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Attempt to authenticate admin
        $admin = Admin::where('emailAdmin', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->passAdmin)) {
            // Authentication passed, store admin data in session
            session([
                'nmAdmin' => $admin->nmAdmin,
                'fotoAdmin' => $admin->fotoAdmin, // Assuming 'fotoAdmin' is the field name in the database
            ]);

            return redirect()->route('adminpage');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->route('kesalahanlogin')->with('errorMsg', 'Email atau password salah.');
        }
    }
}
