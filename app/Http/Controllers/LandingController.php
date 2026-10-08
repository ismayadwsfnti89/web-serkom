<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileSekolah;
use App\Models\Berita;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\Pengumuman;
use App\Models\Galeri;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $profil = ProfileSekolah::first();

        // ===== Berita (dengan filter search) =====
        $berita = Berita::where('status', 'Publish')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('judul', 'like', "%{$search}%")
                        ->orWhere('isi', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->limit(4)
            ->get();

        // ===== Stats =====
        $totalSiswa    = Siswa::count();
        $totalGuru     = Guru::count();
        $totalEkskul   = Ekstrakurikuler::count();
        $totalPrestasi = Prestasi::count();

        // ===== Kepala Sekolah (dari tabel guru berdasarkan jabatan) =====
        $kepalaSekolah = Guru::where('jabatan', 'Kepala Sekolah')->first();

        // ===== List =====
        $guru        = Guru::latest()->limit(8)->get();
        $prestasi    = Prestasi::latest()->limit(4)->get();
        $ekskul      = Ekstrakurikuler::latest()->limit(6)->get();
        $pengumuman  = Pengumuman::where('status', 'Publish')->latest()->limit(3)->get();
        $galeri      = Galeri::latest()->limit(8)->get();

        // ===== Galeri untuk carousel hero =====
        $galeriHero = Galeri::where('kategori', 'Foto')
            ->latest()
            ->limit(5)
            ->get();

        return view('landing.index', compact(
            'profil', 'berita',
            'totalSiswa', 'totalGuru', 'totalEkskul', 'totalPrestasi',
            'kepalaSekolah',   // ← tambah ini
            'guru', 'prestasi', 'ekskul', 'pengumuman', 'galeri',
            'galeriHero'
        ));
    }
}
