<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SampahJualController;

// Landing page route
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Customer login route
Route::get('/logincust', function () {
    return view('logincust');
})->name('logincust');

// Admin login routes
Route::get('/loginadmin', [AdminAuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/loginadmin', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Routes that require admin authentication
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // Admin dashboard route
    Route::get('/adminpage', [AdminAuthController::class, 'adminpage'])->name('admin.adminpage');

    // Edit and update routes for SampahJualController
    Route::get('/editsampahjual/{idSampah}', [SampahJualController::class, 'edit'])->name('editsampahjual');
    Route::put('/updatesampahjual/{idSampah}', [SampahJualController::class, 'update'])->name('updatesampahjual');

    // Other admin routes
    Route::get('/pesanan', [AdminAuthController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/leaderboard', [AdminAuthController::class, 'leaderboard'])->name('admin.leaderboard');
    Route::get('/pengajuan-setor', [AdminAuthController::class, 'pengajuanSetor'])->name('admin.pengajuan-setor');
    Route::get('/pengajuan-event', [AdminAuthController::class, 'pengajuanEvent'])->name('admin.pengajuan-event');
    Route::get('/tambah-produk-sampah', [AdminAuthController::class, 'tambahProdukSampah'])->name('admin.tambah-produk-sampah');
    Route::get('/pengajuan-setorsampah', [AdminAuthController::class, 'pengajuanSetorSampah'])->name('admin.pengajuansetorsampah');

    // Admin logout route
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Logout route
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Error login route
Route::get('/kesalahanlogin', function () {
    return view('kesalahanlogin');
})->name('kesalahanlogin');

// Check database connection route
Route::get('/check-database', function () {
    return response()->view('checkdatabaseconnection');
})->name('checkdatabase');

// Additional routes...

