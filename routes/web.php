<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileSekolahController;

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== PROTECTED =====
Route::middleware('auth')->group(function () {

    Route::get('/', fn() => redirect()->route('dashboard'));
    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');

    // ===== CRUD YANG SUDAH JADI =====
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('ekskul', EkstrakurikulerController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::get('/profil-sekolah', [ProfileSekolahController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-sekolah', [ProfileSekolahController::class, 'update'])->name('profil.update');
});
// ===== LANDING PAGE (publik) =====
Route::get('/landing', function () {
    return view('landing.index');
})->name('landing');