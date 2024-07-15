<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Assuming Event model exists

class EventController extends Controller
{
    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        $lastEvent = Event::latest()->first();
        $lastEventId = $lastEvent ? $lastEvent->idEvent : 'EVENT0000';
        $nextEventId = 'EVENT' . str_pad((int)substr($lastEventId, 5) + 1, 4, '0', STR_PAD_LEFT);
        
        return view('daftarevent', compact('nextEventId'));
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'idEvent' => 'required|string|max:255',
            'nmEvent' => 'required|string|max:255',
            'tglEvent' => 'required|date',
            'TempatEvent' => 'required|string|max:255',
            'JumlahPeserta' => 'required|integer',
            'JamMulai' => 'required|string|max:255',
            'JamBerakhir' => 'required|string|max:255',
        ]);

        // Store the event data into the database
        $event = Event::create($validated);

        // Redirect to the result page with the event data
        return redirect()->route('hasilevent', $event);
    }

    /**
     * Display the specified event result.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\View\View
     */
    public function showResult(Event $event)
    {
        return view('hasilevent', compact('event'));
    }
}
