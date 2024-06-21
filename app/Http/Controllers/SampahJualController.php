<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use Illuminate\Http\Request;

class SampahJualController extends Controller
{
    public function edit($idSampah)
    {
        $sampah = SampahJual::findOrFail($idSampah);
        return view('admin.editsampahjual', compact('sampah'));
    }

    public function update(Request $request, $idSampah)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'nmSampah' => 'required',
            'poinjual' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data sampah yang akan diupdate
        $sampah = SampahJual::findOrFail($idSampah);

        // Update data sampah
        $sampah->nmSampah = $request->nmSampah;
        $sampah->poinjual = $request->poinjual;

        // Proses upload gambar jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/fotos', $fileName);
            $sampah->foto = $fileName;
        }

        $sampah->save();

        return redirect()->route('admin.adminpage')->with('successMsg', 'Data sampah berhasil diupdate');
    }
}
