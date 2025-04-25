<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kampus;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Untuk logging
use Illuminate\Support\Facades\Response;

class RegisterPelangganController extends Controller
{
    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        $kampus = Kampus::all(); // Ambil data kampus
        $fakultas = Fakultas::all(); // Ambil data fakultas
        return view('registercust', compact('kampus', 'fakultas'));
    }

    // Proses registrasi pelanggan
    public function register(Request $request)
{
    // Menambahkan log untuk melihat request data yang diterima
    Log::debug('Data yang diterima: ', $request->all());

    // Validasi input dari form
    $validatedData = $request->validate([
        'idPelanggan' => 'required|unique:pelanggan,idPelanggan',
        'username' => 'required|unique:pelanggan,username',
        'password' => 'required|min:6',
        'nim' => 'required|unique:pelanggan,NIM',
        'emailPel' => 'required|email|unique:pelanggan,emailPel', // Menambahkan validasi email
        'idKampus' => 'required',
        'idFakultas' => 'required',
        'jenisKel' => 'required'
    ]);

    // Log hasil validasi untuk memastikan validasi berhasil
    Log::debug('Data yang sudah divalidasi: ', $validatedData);

    try {
        // Membuat objek pelanggan baru
        $pelanggan = new Pelanggan();
        $pelanggan->idPelanggan = $request->idPelanggan;
        $pelanggan->username = $request->username;
        $pelanggan->passPel = Hash::make($request->password); // Hash password
        $pelanggan->NIM = $request->nim;
        $pelanggan->emailPel = $request->emailPel; // Menyimpan email pelanggan
        $pelanggan->idKampus = $request->idKampus;
        $pelanggan->idFakultas = $request->idFakultas;
        $pelanggan->jenisKel = $request->jenisKel;

        // Log untuk memeriksa data pelanggan yang akan disimpan
        Log::debug('Data pelanggan yang akan disimpan: ', $pelanggan->toArray());

        // Menyimpan data pelanggan ke database
        $pelanggan->save();

        // Cek apakah data sudah masuk
        Log::debug('Data pelanggan berhasil disimpan: ', $pelanggan->toArray());

        // Jika sukses, kembalikan API response
        return Response::json([
            'status' => 'success',
            'message' => 'Registrasi berhasil!',
            'data' => $pelanggan
        ], 200);

    } catch (\Exception $e) {
        // Tangani jika ada error dalam menyimpan data
        Log::error('Error saat menyimpan data pelanggan: ', ['error' => $e->getMessage()]);

        // Kembalikan error response
        return Response::json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat registrasi!',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
