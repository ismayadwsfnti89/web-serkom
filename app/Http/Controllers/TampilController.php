<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\Pengumuman;
use App\Models\ProfileSekolah;

class TampilController extends Controller
{
    private function profil()
    {
        return ProfileSekolah::first();
    }

    public function guru()
    {
        return view('tampil.guru', [
            'guru'   => Guru::latest()->paginate(12),
            'profil' => $this->profil()
        ]);
    }

    public function berita()
    {
        return view('tampil.berita', [
            'berita' => Berita::where('status', 'Publish')->latest()->paginate(9),
            'profil' => $this->profil()
        ]);
    }

    public function beritaDetail($slug)
    {
        return view('tampil.berita-detail', [
            'berita' => Berita::where('status', 'Publish')->where('slug', $slug)->firstOrFail(),
            'profil' => $this->profil()
        ]);
    }

    public function galeri()
    {
        return view('tampil.galeri', [
            'galeri' => Galeri::latest()->paginate(12),
            'profil' => $this->profil()
        ]);
    }

    public function galeriDetail($id)
    {
        return view('tampil.galeri-detail', [
            'galeri' => Galeri::findOrFail($id),
            'profil' => $this->profil()
        ]);
    }

    public function prestasi()
    {
        return view('tampil.prestasi', [
            'prestasi' => Prestasi::latest()->paginate(12),
            'profil'   => $this->profil()
        ]);
    }

    public function prestasiDetail($slug)
    {
        return view('tampil.prestasi-detail', [
            'prestasi' => Prestasi::where('slug', $slug)->firstOrFail(),
            'profil'   => $this->profil()
        ]);
    }

    public function ekskul()
    {
        return view('tampil.ekskul', [
            'ekskul' => Ekstrakurikuler::latest()->paginate(12),
            'profil' => $this->profil()
        ]);
    }

    public function ekskulDetail($slug)
    {
        return view('tampil.ekskul-detail', [
            'ekskul' => Ekstrakurikuler::where('slug', $slug)->firstOrFail(),
            'profil' => $this->profil()
        ]);
    }

    public function pengumuman()
    {
        return view('tampil.pengumuman', [
            'pengumuman' => Pengumuman::where('status', 'Publish')->latest()->paginate(9),
            'profil'     => $this->profil()
        ]);
    }

    public function pengumumanDetail($id)
    {
        return view('tampil.pengumuman-detail', [
            'pengumuman' => Pengumuman::where('status', 'Publish')->findOrFail($id),
            'profil'     => $this->profil()
        ]);
    }
}
