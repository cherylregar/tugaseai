<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data berdasarkan idSampah
        $sampahKertas = SampahJual::where('idSampah', 'SAMP001')->first();
        $sampahKardus = SampahJual::where('idSampah', 'SAMP002')->first();
        $sampahPlastik = SampahJual::where('idSampah', 'SAMP003')->first();

        return view('landingpage', compact('sampahKertas', 'sampahKardus', 'sampahPlastik'));
    }
}
