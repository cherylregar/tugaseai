<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.loginadmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('emailAdmin', 'password');

        $admin = Admin::where('emailAdmin', $credentials['emailAdmin'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->passAdmin)) {
            session(['nmAdmin' => $admin->nmAdmin, 'fotoAdmin' => $admin->fotoAdmin]);

            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.adminpage');
        }

        return redirect()->route('loginadmin')->with('errorMsg', 'Email atau sandi tidak valid.');
    }

    public function adminpage()
    {
        $sampahKertas = SampahJual::where('idSampah', 'SAMP001')->first();
        $sampahKardus = SampahJual::where('idSampah', 'SAMP002')->first();
        $sampahPlastik = SampahJual::where('idSampah', 'SAMP003')->first();
        $sampahItems = SampahJual::all();

        return view('admin.adminpage', compact('sampahKertas', 'sampahKardus', 'sampahPlastik', 'sampahItems'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginadmin');
    }

    // Other methods if any
}
