<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== PROTECTED (harus login) =====
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);

    // Placeholder
    Route::prefix('ekskul')->name('ekskul.')->group(function () {
        Route::get('/', fn() => 'Halaman Ekstrakurikuler - Coming Soon')->name('index');
    });

    Route::prefix('prestasi')->name('prestasi.')->group(function () {
        Route::get('/', fn() => 'Halaman Prestasi - Coming Soon')->name('index');
    });

    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', fn() => 'Halaman Galeri - Coming Soon')->name('index');
    });

    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', fn() => 'Halaman Berita - Coming Soon')->name('index');
    });

    Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
        Route::get('/', fn() => 'Halaman Pengumuman - Coming Soon')->name('index');
    });

    Route::get('/profil-sekolah', fn() => 'Halaman Profil Sekolah - Coming Soon')->name('profil.edit');
});
