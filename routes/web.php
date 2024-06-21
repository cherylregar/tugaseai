<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SampahJualController;

// Rute untuk halaman landing
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

// Rute untuk halaman about (halaman umum)
Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute untuk halaman login kustom (halaman umum)
Route::get('/logincust', function () {
    return view('logincust');
})->name('logincust');

// Rute untuk form login admin
Route::get('/loginadmin', [AdminAuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/loginadmin', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Middleware untuk grup rute admin
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/adminpage', [AdminAuthController::class, 'adminpage'])->name('admin.adminpage');
    Route::get('/pesanan', [AdminAuthController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/leaderboard', [AdminAuthController::class, 'leaderboard'])->name('admin.leaderboard');
    Route::get('/pengajuan-setor', [AdminAuthController::class, 'pengajuanSetor'])->name('admin.pengajuan-setor');
    Route::get('/pengajuan-event', [AdminAuthController::class, 'pengajuanEvent'])->name('admin.pengajuan-event');
    Route::get('/tambah-produk-sampah', [AdminAuthController::class, 'tambahProdukSampah'])->name('admin.tambah-produk-sampah');
    Route::get('/pengajuan-setorsampah', [AdminAuthController::class, 'pengajuanSetorSampah'])->name('admin.pengajuansetorsampah');

    // Rute untuk mengedit data sampah
    Route::get('/sampahjual/{idSampah}/edit', [SampahJualController::class, 'edit'])->name('sampahjual.edit');
    Route::put('/sampahjual/{idSampah}', [SampahJualController::class, 'update'])->name('sampahjual.update');
});

// Rute untuk halaman kesalahan login
Route::get('/kesalahanlogin', function () {
    return view('kesalahanlogin');
})->name('kesalahanlogin');

// Rute untuk memeriksa koneksi database
Route::get('/check-database', function () {
    return response()->view('checkdatabaseconnection');
})->name('checkdatabase');
