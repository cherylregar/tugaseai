<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Import Hash dari namespace Illuminate\Support\Facades
use App\Models\Admin; // Pastikan model Admin diimpor jika belum diimpor

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

    public function update(Request $request, $idSampah)
    {
        // Validasi input jika diperlukan

        $sampah = SampahJual::find($idSampah);

        if (!$sampah) {
            return redirect()->back()->with('errorMsg', 'Data sampah tidak ditemukan.');
        }

        // Update atribut-atribut yang diubah
        $sampah->nmSampah = $request->input('nmSampah');
        $sampah->poinjual = $request->input('poinjual');

        // Simpan perubahan
        $sampah->save();

        // Redirect dengan pesan sukses atau error jika diperlukan
        return redirect()->route('admin.adminpage')->with('successMsg', 'Data sampah berhasil diperbarui.');
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
