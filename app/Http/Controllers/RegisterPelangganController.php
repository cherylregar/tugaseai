<?php
// app/Http/Controllers/RegisterPelangganController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kampus;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Untuk logging

class RegisterPelangganController extends Controller
{
    public function showRegisterForm()
    {
        $kampus = Kampus::all(); // Ambil data kampus
        $fakultas = Fakultas::all(); // Ambil data fakultas
        return view('registercust', compact('kampus', 'fakultas'));
    }

    // app/Http/Controllers/RegisterPelangganController.php

// app/Http/Controllers/RegisterPelangganController.php

public function register(Request $request)
{
    // Menambahkan log untuk melihat request data yang diterima
    Log::debug('Data yang diterima: ', $request->all());

    $validatedData = $request->validate([
        'idPelanggan' => 'required|unique:pelanggan,idPelanggan',
        'username' => 'required|unique:pelanggan,username',
        'password' => 'required|min:6',
        'nim' => 'required|unique:pelanggan,NIM',
        'idKampus' => 'required',
        'idFakultas' => 'required',
        'jenisKel' => 'required'
    ]);

    // Log hasil validasi untuk memastikan validasi berhasil
    Log::debug('Data yang sudah divalidasi: ', $validatedData);

    try {
        $pelanggan = new Pelanggan();
        $pelanggan->idPelanggan = $request->idPelanggan;
        $pelanggan->username = $request->username;
        $pelanggan->passPel = Hash::make($request->password);
        $pelanggan->NIM = $request->nim;
        $pelanggan->idKampus = $request->idKampus;
        $pelanggan->idFakultas = $request->idFakultas;
        $pelanggan->jenisKel = $request->jenisKel;

        // Log untuk memeriksa data pelanggan yang akan disimpan
        Log::debug('Data pelanggan yang akan disimpan: ', $pelanggan->toArray());

        $pelanggan->save();

        // Cek apakah data sudah masuk
        Log::debug('Data pelanggan berhasil disimpan: ', $pelanggan->toArray());

        return redirect()->route('logincustform')->with('success', 'Registrasi berhasil! Silakan login.');
    } catch (\Exception $e) {
        // Tangani jika ada error dalam menyimpan data
        Log::error('Error saat menyimpan data pelanggan: ', ['error' => $e->getMessage()]);

        // Arahkan ke halaman testingregister.blade.php dengan pesan error
        return redirect()->route('testingregister')->with('error', $e->getMessage());
    }
}


}
