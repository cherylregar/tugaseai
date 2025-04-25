<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganControllerForAPI; // Pastikan namespace controller benar



// Route default Laravel Sanctum (jika Anda menggunakannya)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route API untuk registrasi pelanggan
Route::post('/registercust', [PelangganControllerForAPI::class, 'register']);
