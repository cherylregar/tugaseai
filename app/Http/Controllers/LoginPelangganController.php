<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginPelangganController extends Controller
{
    public function showLoginForm()
    {
        return view('logincust');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $pelanggan = DB::table('pelanggan')
            ->where('username', $credentials['username'])
            ->first();

        if ($pelanggan && Hash::check($credentials['password'], $pelanggan->passPel)) {
            // Login sukses
            Session::put('idPelanggan', $pelanggan->idPelanggan);
            Session::put('username', $pelanggan->username);

            return redirect()->route('berhasillogin');
        }

        return back()->with('error', 'Username atau password salah!');
    }
}
