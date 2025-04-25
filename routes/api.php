<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganControllerForAPI;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route register pelanggan
Route::post('/registercust', [PelangganControllerForAPI::class, 'register']);
 