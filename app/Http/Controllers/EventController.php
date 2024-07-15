<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Pelanggan;

class EventController extends Controller
{
    public function create()
    {
        // Ambil ID Event terakhir
        $lastEvent = Event::orderBy('idEvent', 'desc')->first();
        $newEventId = $lastEvent ? 'EVENT' . str_pad((int)substr($lastEvent->idEvent, 5) + 1, 4, '0', STR_PAD_LEFT) : 'EVENT1001';

        return view('daftarevent', ['newEventId' => $newEventId]);
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'idPelanggan' => 'required|string|max:255',
            'idEvent' => 'required|string|max:255',
            'nmEvent' => 'required|string|max:255',
            'tglEvent' => 'required|date',
            'TempatEvent' => 'required|string|max:255',
            'JumlahPeserta' => 'required|integer',
            'JamMulai' => 'required',
            'JamBerakhir' => 'required',
        ]);

        // Periksa apakah ID Pelanggan ada dalam database
        $pelanggan = Pelanggan::where('idPelanggan', $request->idPelanggan)->first();
        if (!$pelanggan) {
            return redirect()->back()->withInput()->with('error', 'ID Pelanggan tidak ditemukan.');
        }

        // Simpan event baru ke dalam database
        Event::create($request->all());

        return redirect()->route('daftarevent')->with('success', 'Event berhasil didaftarkan.');
    }
}
