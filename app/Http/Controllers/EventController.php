<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Pelanggan;

class EventController extends Controller
{
    public function create()
    {
        $lastEvent = Event::orderBy('idEvent', 'desc')->first();
        $newEventId = $lastEvent ? 'EVENT' . str_pad((int)substr($lastEvent->idEvent, 5) + 1, 4, '0', STR_PAD_LEFT) : 'EVENT1001';

        return view('daftarevent', ['newEventId' => $newEventId]);
    }

    public function store(Request $request)
    {
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

        \Log::info('ID Pelanggan dari form: ' . $request->idPelanggan);

        $pelanggan = Pelanggan::where('idPelanggan', $request->idPelanggan)->first();

        if (!$pelanggan) {
            \Log::error('ID Pelanggan tidak ditemukan di database: ' . $request->idPelanggan);
            return redirect()->back()->withInput()->with('error', 'ID Pelanggan tidak ditemukan.');
        }

        Event::create($request->all());

        return redirect()->route('daftarevent')->with('success', 'Event berhasil didaftarkan.');
    }

    public function validatePelanggan(Request $request)
    {
        $idPelanggan = $request->idPelanggan;
        $exists = Pelanggan::where('idPelanggan', $idPelanggan)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function edit($idEvent)
    {
        $event = Event::findOrFail($idEvent); // Assuming 'idEvent' is your custom event ID
        return view('editevent', compact('event'));
    }

    public function update(Request $request, $idEvent)
    {
        $event = Event::findOrFail($idEvent); // Assuming 'idEvent' is your custom event ID

        $request->validate([
            'idPelanggan' => 'required|string|max:255',
            'nmEvent' => 'required|string|max:255',
            'tglEvent' => 'required|date',
            'TempatEvent' => 'required|string|max:255',
            'JumlahPeserta' => 'required|integer',
            'JamMulai' => 'required',
            'JamBerakhir' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.pengajuan-event')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($idEvent)
    {
        $event = Event::findOrFail($idEvent);
        $event->delete();

        return redirect()->route('admin.pengajuan-event')->with('success', 'Event berhasil dihapus.');
    }
}
