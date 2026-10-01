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
            'siswaBaru'     => Siswa::whereMonth('created_at', now()->month)
                                     ->whereYear('created_at', now()->year)
                                     ->count(),
            'profilLengkap' => $profil !== null,
        ]);
    }
}