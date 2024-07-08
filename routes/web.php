<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SampahJualController;
use App\Http\Controllers\ArticleController;

// Landing page route
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
Route::get('/articlespages/{idArtikel}', [ArticleController::class, 'show'])->name('articlespages.show');


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
    Route::get('/kelola-artikel', [AdminAuthController::class, 'kelolaartikel'])->name('admin.kelola-artikel');

    Route::get('/admin/kelolaartikel', [ArticleController::class, 'showKelolaArtikel'])->name('admin.kelolaartikel');
    Route::post('/admin/update/landingpage', [ArticleController::class, 'updateLandingPageArticles'])->name('admin.update.landingpage');
    
    Route::get('/admin/edit/{idArtikel}', [ArticleController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{idArtikel}', [ArticleController::class, 'update'])->name('admin.update');
    Route::put('/admin/articles/{idArtikel}', [ArticleController::class, 'update'])->name('admin.update');


    Route::delete('/admin/delete/{idArtikel}', [ArticleController::class, 'destroy'])->name('admin.delete');



    // Route untuk form submission
    Route::post('/storeproduksampah', [SampahJualController::class, 'store'])->name('admin.storeproduksampah');
    Route::delete('/sampahjual/{idSampah}', [SampahJualController::class, 'destroy'])->name('sampahjual.destroy');

    // Update landing page articles route
    Route::post('/update-landing-page', [ArticleController::class, 'updateLandingPageArticles'])->name('admin.update.landingpage');

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
