<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileSekolahController;

Route::get('/', function () {
    $profil = \App\Models\ProfileSekolah::first();

    return view('landing.index', [
        'profil'        => $profil,
        'totalSiswa'    => \App\Models\Siswa::count(),
        'totalGuru'     => \App\Models\Guru::count(),
        'totalEkskul'   => \App\Models\Ekstrakurikuler::count(),
        'totalPrestasi' => \App\Models\Prestasi::count(),
        'berita'        => \App\Models\Berita::where('status', 'Publish')
                                ->latest()->take(4)->get(),
        'pengumuman'    => \App\Models\Pengumuman::where('status', 'Publish')
                                ->latest()->take(3)->get(),
        'galeri'        => \App\Models\Galeri::latest()->take(8)->get(),
        'ekskul'        => \App\Models\Ekstrakurikuler::latest()->take(6)->get(),
        'prestasi'      => \App\Models\Prestasi::latest()->take(4)->get(),
        'guru'          => \App\Models\Guru::latest()->take(8)->get(),  // ← TAMBAH
    ]);
})->name('landing');

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== PROTECTED =====
Route::middleware('auth')->group(function () {

    // ===== DASHBOARD =====
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ===== SISWA =====
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');

    Route::middleware('admin')->group(function () {
        Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('siswa', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    Route::get('siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');

    // ===== GURU =====
    Route::get('guru', [GuruController::class, 'index'])->name('guru.index');

    Route::middleware('admin')->group(function () {
        Route::get('guru/create', [GuruController::class, 'create'])->name('guru.create');
        Route::post('guru', [GuruController::class, 'store'])->name('guru.store');
        Route::get('guru/{guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('guru/{guru}', [GuruController::class, 'update'])->name('guru.update');
        Route::delete('guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
    });

    Route::get('guru/{guru}', [GuruController::class, 'show'])->name('guru.show');

    // ===== USER =====
    Route::get('user', [UserController::class, 'index'])->name('user.index');

    Route::middleware('admin')->group(function () {
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');

    // ===== MENU LAIN =====
    Route::resource('ekskul', EkstrakurikulerController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('pengumuman', PengumumanController::class);

    // ===== PROFIL SEKOLAH =====
    Route::get('/profil-sekolah', [ProfileSekolahController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-sekolah', [ProfileSekolahController::class, 'update'])->name('profil.update');
});