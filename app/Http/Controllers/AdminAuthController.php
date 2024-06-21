<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\SampahJual;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.loginadmin'); // Pastikan path ini sesuai dengan lokasi file
    }

    public function login(Request $request)
    {
        $credentials = $request->only('emailAdmin', 'password');

        // Menggunakan Eloquent untuk mencari admin berdasarkan email
        $admin = Admin::where('emailAdmin', $credentials['emailAdmin'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->passAdmin)) {
            // Jika login berhasil, simpan nmAdmin dan fotoAdmin dalam sesi
            session(['nmAdmin' => $admin->nmAdmin, 'fotoAdmin' => $admin->fotoAdmin]);

            // Login menggunakan guard admin
            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.adminpage');
        }

        return redirect()->route('loginadmin')->with('errorMsg', 'Email atau sandi tidak valid.');
    }

    public function adminpage()
    {
        // Ambil semua data dari tabel SampahJual
        $sampahJual = SampahJual::all();

        // Kirim data ke view adminpage.blade.php
        return view('admin.adminpage', compact('sampahJual'));
    }
}
