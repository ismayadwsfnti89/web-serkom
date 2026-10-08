<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TampilController;

/*
|--------------------------------------------------------------------------
| Landing Page (bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::prefix('public')->group(function () {
    Route::get('/guru', [TampilController::class, 'guru'])->name('tampil.guru');
    Route::get('/berita', [TampilController::class, 'berita'])->name('tampil.berita');
    Route::get('/berita/{id}', [TampilController::class, 'beritaDetail'])->name('tampil.berita.detail');
    Route::get('/galeri', [TampilController::class, 'galeri'])->name('tampil.galeri');
    Route::get('/prestasi', [TampilController::class, 'prestasi'])->name('tampil.prestasi');
    Route::get('/ekskul', [TampilController::class, 'ekskul'])->name('tampil.ekskul');
    Route::get('/pengumuman', [TampilController::class, 'pengumuman'])->name('tampil.pengumuman');
});

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Area Admin & Operator (harus login)
|--------------------------------------------------------------------------
| Keterangan:
|   middleware('admin')                 → cuma admin
|   middleware('admin:admin,operator')  → admin & operator
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard — semua yang login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |----------------------------------------------------------------------
    | Siswa
    |----------------------------------------------------------------------
    */

    // Lihat (index & show) — admin & operator
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
        Route::get('siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    });

    // Tambah & Hapus — cuma admin
    Route::middleware('admin')->group(function () {
        Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('siswa', [SiswaController::class, 'store'])->name('siswa.store');
        Route::delete('siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | Guru
    |----------------------------------------------------------------------
    */

    // Lihat & edit — admin & operator
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('guru', [GuruController::class, 'index'])->name('guru.index');
        Route::get('guru/{id}', [GuruController::class, 'show'])->name('guru.show');
        Route::get('guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    });

    // Tambah & hapus — cuma admin
    Route::middleware('admin')->group(function () {
        Route::get('guru/create', [GuruController::class, 'create'])->name('guru.create');
        Route::post('guru', [GuruController::class, 'store'])->name('guru.store');
        Route::delete('guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | User — cuma admin
    |----------------------------------------------------------------------
    */
    Route::middleware('admin')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | Ekstrakurikuler — admin & operator
    |----------------------------------------------------------------------
    */
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('ekskul', [EkstrakurikulerController::class, 'index'])->name('ekskul.index');
        Route::get('ekskul/create', [EkstrakurikulerController::class, 'create'])->name('ekskul.create');
        Route::post('ekskul', [EkstrakurikulerController::class, 'store'])->name('ekskul.store');
        Route::get('ekskul/{id}', [EkstrakurikulerController::class, 'show'])->name('ekskul.show');
        Route::get('ekskul/{id}/edit', [EkstrakurikulerController::class, 'edit'])->name('ekskul.edit');
        Route::put('ekskul/{id}', [EkstrakurikulerController::class, 'update'])->name('ekskul.update');
        Route::delete('ekskul/{id}', [EkstrakurikulerController::class, 'destroy'])->name('ekskul.destroy');
    });
    Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil Saya — semua yang login
    Route::get('/profil-saya', [UserController::class, 'profilSaya'])->name('profil.saya');
    Route::put('/profil-saya', [UserController::class, 'updateProfilSaya'])->name('profil.saya.update');

    // ... sisanya (siswa, guru, dll)
    });

    /*
    |----------------------------------------------------------------------
    | Prestasi — admin & operator
    |----------------------------------------------------------------------
    */
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
        Route::get('prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
        Route::post('prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
        Route::get('prestasi/{id}', [PrestasiController::class, 'show'])->name('prestasi.show');
        Route::get('prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
        Route::put('prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
        Route::delete('prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | Galeri — admin & operator
    |----------------------------------------------------------------------
    */
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
        Route::get('galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
        Route::post('galeri', [GaleriController::class, 'store'])->name('galeri.store');
        Route::get('galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');
        Route::get('galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
        Route::put('galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
        Route::delete('galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | Berita — admin & operator
    |----------------------------------------------------------------------
    */
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('berita/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::get('berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | Pengumuman — admin & operator
    |----------------------------------------------------------------------
    */
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::get('pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
        Route::get('pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put('pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::delete('pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    });

    /*
    |----------------------------------------------------------------------
    | Profil Sekolah — admin & operator
    |----------------------------------------------------------------------
    */
    Route::middleware('admin:admin,operator')->group(function () {
        Route::get('/profil-sekolah', [ProfileSekolahController::class, 'edit'])->name('profil.edit');
        Route::put('/profil-sekolah', [ProfileSekolahController::class, 'update'])->name('profil.update');
    });
});