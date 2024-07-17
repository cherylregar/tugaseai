<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SampahJualController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginPelangganController;
use App\Http\Controllers\EventController;

// Landing page route
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
Route::get('/articlespages/{idArtikel}', [ArticleController::class, 'show'])->name('articlespages.show');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Customer login route
Route::get('/logincust', [LoginPelangganController::class, 'showLoginForm'])->name('logincust');
Route::post('/logincust', [LoginPelangganController::class, 'login'])->name('logincust.submit');
Route::post('/logout', [LoginPelangganController::class, 'logout'])->name('logout');
Route::post('/login', [LoginPelangganController::class, 'login'])->name('login');

// Admin login routes
Route::get('/loginadmin', [AdminAuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/loginadmin', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Routes that require admin authentication
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/adminpage', [AdminAuthController::class, 'adminpage'])->name('admin.adminpage');
    Route::get('/editsampahjual/{idSampah}', [SampahJualController::class, 'edit'])->name('editsampahjual');
    Route::put('/updatesampahjual/{idSampah}', [SampahJualController::class, 'update'])->name('updatesampahjual');
    Route::get('/pesanan', [AdminAuthController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/leaderboard', [AdminAuthController::class, 'leaderboard'])->name('admin.leaderboard');
    Route::get('/pengajuan-setor', [AdminAuthController::class, 'pengajuanSetor'])->name('admin.pengajuan-setor');
    Route::get('/pengajuan-event', [AdminAuthController::class, 'pengajuanEvent'])->name('admin.pengajuan-event');
    Route::get('/tambah-produk-sampah', [AdminAuthController::class, 'tambahProdukSampah'])->name('admin.tambah-produk-sampah');
    Route::get('/pengajuan-setorsampah', [AdminAuthController::class, 'pengajuanSetorSampah'])->name('admin.pengajuansetorsampah');
    Route::get('/kelola-artikel', [AdminAuthController::class, 'kelolaartikel'])->name('admin.kelola-artikel');
    Route::get('/tambah-artikel', [AdminAuthController::class, 'tambahartikel'])->name('admin.tambah-artikel');
    Route::get('/kelolaartikel', [ArticleController::class, 'showKelolaArtikel'])->name('admin.kelolaartikel');
    Route::post('/update/landingpage', [ArticleController::class, 'updateLandingPageArticles'])->name('admin.update.landingpage');
    Route::get('/edit/{idArtikel}', [ArticleController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{idArtikel}', [ArticleController::class, 'update'])->name('admin.update');
    Route::put('/articles/{idArtikel}', [ArticleController::class, 'update'])->name('admin.update');
    Route::get('/tambahartikel', [ArticleController::class, 'create'])->name('admin.tambahartikel');
    Route::post('/storeartikel', [ArticleController::class, 'store'])->name('admin.storeartikel');
    Route::delete('/delete/{idArtikel}', [ArticleController::class, 'destroy'])->name('admin.delete');
    Route::post('/storeproduksampah', [SampahJualController::class, 'store'])->name('admin.storeproduksampah');
    Route::delete('/sampahjual/{idSampah}', [SampahJualController::class, 'destroy'])->name('sampahjual.destroy');
    Route::post('/update-landing-page', [ArticleController::class, 'updateLandingPageArticles'])->name('admin.update.landingpage');
});

// Route for event
Route::get('/daftarevent', [EventController::class, 'create'])->name('daftarevent');
Route::post('/daftarevent', [EventController::class, 'store'])->name('events.store');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::get('/suksesevent/{id}', [EventController::class, 'showSuccess'])->name('suksesevent');
Route::post('/validate-pelanggan', [EventController::class, 'validatePelanggan'])->name('validate.pelanggan');

// Error login route
Route::get('/kesalahanlogin', function () {
    return view('kesalahanlogin');
})->name('kesalahanlogin');

// Check database connection route
Route::get('/check-database', function () {
    return response()->view('checkdatabaseconnection');
})->name('checkdatabase');
