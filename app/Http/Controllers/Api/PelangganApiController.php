<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganApiController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'emailPel' => 'required|email|unique:pelanggans,emailPel',
            'passPel' => 'required|string|min:8',
        ]);

        // Create Pelanggan
        $pelanggan = Pelanggan::create([
            'username' => $validated['username'],
            'emailPel' => $validated['emailPel'],
            'passPel' => bcrypt($validated['passPel']),
        ]);

        return response()->json($pelanggan, 201); // Return created pelanggan
    }
}
