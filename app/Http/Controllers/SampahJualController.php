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
        $sampah = SampahJual::findOrFail($idSampah);

        $request->validate([
            'nmSampah' => 'required|string|max:255',
            'poinjual' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        $sampah->nmSampah = $request->nmSampah;
        $sampah->poinjual = $request->poinjual;

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Get filename with the extension
            $filename = $request->file('foto')->getClientOriginalName();

            // Move the file to the directory
            $directory = public_path('storage/fotos');
            $request->file('foto')->move($directory, $filename);
        } else {
            $filename = null;
        }
        $sampah->foto = $filename;
        $sampah->save();

        return redirect()->route('admin.adminpage')->with('success', 'Sampah updated successfully.');
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
            $filename = $request->file('foto')->getClientOriginalName();

            // Move the file to the directory
            $directory = public_path('storage/fotos');
            $request->file('foto')->move($directory, $filename);
        } else {
            $filename = null;
        }

        $sampah = new SampahJual();
        $sampah->idSampah = $request->idSampah;
        $sampah->nmSampah = $request->nmSampah;
        $sampah->poinjual = $request->poinjual;
        $sampah->foto = $filename;
        $sampah->save();

        // Construct the success message with idSampah
        $successMessage = 'Data sampah dengan ' . $sampah->idSampah . ' telah tersimpan';

        return redirect()->route('admin.adminpage')->with('success', $successMessage);
    }

    public function destroy($idSampah)
    {
        $sampah = SampahJual::find($idSampah);

        if (!$sampah) {
            return redirect()->route('admin.adminpage')->with('error', 'Delete data failed: Data sampah tidak ditemukan.');
        }

        // Delete photo if exists
        if ($sampah->foto) {
            Storage::delete('public/fotos/' . $sampah->foto);
        }

        $sampah->delete();

        return redirect()->route('admin.adminpage')->with('success', 'Data sampah berhasil dihapus.');
    }
}
