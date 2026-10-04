<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\ProfileSekolah;

class DashboardController extends Controller
{
    public function index()
    {
        $profil = ProfileSekolah::first();

        return view('dashboard.index', [
            'totalSiswa'    => Siswa::count(),
            'totalGuru'     => Guru::count(),
            'totalEkskul'   => Ekstrakurikuler::count(),
            'totalPrestasi' => Prestasi::count(),
            'siswaBaru'     => Siswa::where('tahun_masuk', now()->year)->count(),  // ← pakai tahun_masuk
            'profilLengkap' => $profil !== null,
        ]);
    }
}