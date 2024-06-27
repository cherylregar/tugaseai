<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SampahJualController extends Controller
{
    public function edit($idSampah)
    {
        $sampah = SampahJual::find($idSampah);

        if (!$sampah) {
            return redirect()->route('admin.adminpage')->with('error', 'Edit data failed: Data sampah tidak ditemukan.');
        }

        return view('editsampahjual', compact('sampah'));
    }

    public function update(Request $request, $idSampah)
    {
        $request->validate([
            'nmSampah' => 'required|string|max:255',
            'poinjual' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        $sampah = SampahJual::find($idSampah);

        if (!$sampah) {
            return redirect()->route('admin.adminpage')->with('error', 'Update data failed: Data sampah tidak ditemukan.');
        }

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('foto')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('foto')->storeAs('public/fotos', $fileNameToStore);

            // Delete old photo if exists
            if ($sampah->foto) {
                Storage::delete('public/fotos/' . $sampah->foto);
            }

            $sampah->foto = $fileNameToStore;
        }

        $sampah->nmSampah = $request->nmSampah;
        $sampah->poinjual = $request->poinjual;
        $sampah->save();

        return redirect()->route('admin.adminpage')->with('success', 'Data sampah berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idSampah' => 'required|string|max:255|unique:sampahjual,idSampah',
            'nmSampah' => 'required|string|max:255',
            'poinjual' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('foto')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('foto')->storeAs('public/fotos', $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }

        $sampah = new SampahJual();
        $sampah->idSampah = $request->idSampah;
        $sampah->nmSampah = $request->nmSampah;
        $sampah->poinjual = $request->poinjual;
        $sampah->foto = $fileNameToStore;
        $sampah->save();

        return redirect()->route('admin.adminpage')->with('success', 'Data sampah berhasil ditambahkan.');
    }

    public function destroy($idSampah)
    {
        $sampah = SampahJual::find($idSampah);

        if (!$sampah) {
            return redirect()->route('admin.adminpage')->with('error', 'Delete data failed: Data sampah tidak ditemukan.');
        }

        if ($sampah->foto) {
            Storage::delete('public/fotos/' . $sampah->foto);
        }

        $sampah->delete();

        return redirect()->route('admin.adminpage')->with('success', 'Data sampah berhasil dihapus.');
    }
}
