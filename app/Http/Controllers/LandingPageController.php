<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampahJual;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data dari database berdasarkan nmSampah yang sesuai
        $sampahKertas = SampahJual::where('nmSampah', 'Kertas')->first();
        $sampahKardus = SampahJual::where('nmSampah', 'Kardus')->first();
        $sampahPlastik = SampahJual::where('nmSampah', 'Plastik')->first();

        // Kirim data ke view landingpage.blade.php
        return view('landingpage', compact('sampahKertas', 'sampahKardus', 'sampahPlastik'));
    }
}
