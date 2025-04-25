<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PelangganControllerForAPI extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:pelanggan,username',
            'emailPel' => 'required|email|unique:pelanggan,emailPel',
            'password' => 'required|min:6',
            'NIM' => 'required|unique:pelanggan,NIM',
            'idKampus' => 'required|exists:kampus,idKampus',
            'idFakultas' => 'required|exists:fakultas,idFakultas',
            'jenisKel' => 'required|in:Laki-laki,Perempuan',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Generate ID Pelanggan baru (contoh: PLG2025004)
        $lastPelanggan = Pelanggan::latest('idPelanggan')->first();
        $lastId = $lastPelanggan ? intval(substr($lastPelanggan->idPelanggan, 3)) + 1 : 1;
        $newId = 'PLG' . str_pad($lastId, 7, '0', STR_PAD_LEFT);

        // Simpan data pelanggan
        $pelanggan = Pelanggan::create([
            'idPelanggan' => $newId,
            'username' => $request->username,
            'emailPel' => $request->emailPel,
            'passPel' => Hash::make($request->password),
            'NIM' => $request->NIM,
            'idKampus' => $request->idKampus,
            'idFakultas' => $request->idFakultas,
            'jenisKel' => $request->jenisKel
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil',
            'data' => $pelanggan
        ], 201);
    }
}
