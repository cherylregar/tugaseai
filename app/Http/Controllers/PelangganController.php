<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; // Sesuaikan dengan model Pelanggan yang Anda gunakan

class PelangganController extends Controller
{
    /**
     * Check if a Pelanggan ID exists.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkPelangganExistence($id)
    {
        $exists = Pelanggan::where('idPelanggan', $id)->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
}
