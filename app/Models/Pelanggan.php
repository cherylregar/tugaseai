<?php

// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'username' => 'required',
            'idEvent' => 'required',
            'nmEvent' => 'required',
            'tglEvent' => 'required|date',
            'TempatEvent' => 'required',
            'JumlahPeserta' => 'required|integer',
            'JamMulai' => 'required',
            'JamBerakhir' => 'required',
        ]);

        // Simpan data ke database
        Event::create($request->all());

        // Redirect ke halaman daftarevent.blade.php dengan pesan sukses
        return redirect()->route('daftarevent')->with('success', 'Data event anda sudah terkirim.');
    }
}
