<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan; // Pastikan path model Pelanggan sudah benar
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Optional: untuk logging error

class PelangganControllerForAPI extends Controller
{
    public function register(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:pelanggan,username',
            'emailPel' => 'required|email|unique:pelanggan,emailPel',
            'password' => 'required|min:6',
            'NIM' => 'required|unique:pelanggan,NIM',
            'idKampus' => 'required|exists:kampus,idKampus', // Pastikan tabel 'kampus' ada
            'idFakultas' => 'required|exists:fakultas,idFakultas', // Pastikan tabel 'fakultas' ada
            'jenisKel' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Jika validasi gagal, kembalikan respons error 422
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity
        }

        // Generate ID Pelanggan baru
        try {
            $prefix = 'PLG'; // Atau bisa dibuat dinamis misal 'PLG' . date('Y');
            $lastPelanggan = Pelanggan::where('idPelanggan', 'like', $prefix . '%')
                                      ->orderBy('idPelanggan', 'desc')
                                      ->first();

            $nextIdNumber = 1;
            if ($lastPelanggan) {
                // Ekstrak nomor dari ID terakhir
                $lastIdNumberString = substr($lastPelanggan->idPelanggan, strlen($prefix));
                // Pastikan string yang diekstrak adalah angka sebelum di-cast ke int
                if (ctype_digit($lastIdNumberString)) {
                    $lastIdNumber = intval($lastIdNumberString);
                    $nextIdNumber = $lastIdNumber + 1;
                } else {
                    // Handle kasus jika ID terakhir tidak memiliki format nomor yang valid
                    // Mungkin log error atau gunakan nomor default
                    Log::warning('Format ID Pelanggan terakhir tidak valid: ' . $lastPelanggan->idPelanggan);
                    // Anda bisa memutuskan untuk memulai dari 1 lagi atau strategi lain
                    // Untuk keamanan, kita bisa coba cari ID numerik maksimum
                    $maxNumericId = Pelanggan::selectRaw('CAST(SUBSTR(idPelanggan, ' . (strlen($prefix) + 1) . ') AS UNSIGNED) as num')
                                             ->where('idPelanggan', 'like', $prefix . '%')
                                             ->orderBy('num', 'desc')
                                             ->value('num');
                    $nextIdNumber = ($maxNumericId ?: 0) + 1;

                }
            }

            // Gunakan padding 7 digit setelah prefix (sesuaikan jika perlu)
            $newId = $prefix . str_pad($nextIdNumber, 7, '0', STR_PAD_LEFT);

            // Buat record Pelanggan baru
            $pelanggan = Pelanggan::create([
                'idPelanggan' => $newId,
                'username' => $request->username,
                'emailPel' => $request->emailPel,
                'passPel' => Hash::make($request->password), // Pastikan nama kolom password di DB adalah 'passPel'
                'NIM' => $request->NIM,
                'idKampus' => $request->idKampus,
                'idFakultas' => $request->idFakultas,
                'jenisKel' => $request->jenisKel
                // 'created_at' dan 'updated_at' biasanya dihandle otomatis oleh Eloquent
            ]);

            // Kembalikan respons sukses 201
            return response()->json([
                'status' => true,
                'message' => 'Registration successful',
                'data' => $pelanggan
            ], 201); // Created

        } catch (\Illuminate\Database\QueryException $qe) {
            // Tangani error spesifik database (misal: constraint violation)
            Log::error('Database error during registration: ' . $qe->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Registration failed due to database error.',
                // 'error' => $qe->getMessage() // Jangan tampilkan detail error ke user di production
            ], 500); // Internal Server Error
        } catch (\Exception $e) {
            // Tangani error umum lainnya
            Log::error('General error during registration: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Registration failed due to an unexpected error.',
                // 'error' => $e->getMessage() // Jangan tampilkan detail error ke user di production
            ], 500); // Internal Server Error
        }
    }

}