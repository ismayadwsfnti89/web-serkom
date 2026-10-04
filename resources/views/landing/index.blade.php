@extends('layouts.landing')

@section('title', 'Beranda')
@section('meta_description', 'Website Resmi ' . ($profil->nama_sekolah ?? 'Sekolah'))

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero" id="beranda">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-white mb-3 px-3 py-2 rounded-pill">
                    <i class="bi bi-star-fill me-1"></i> Selamat Datang
                </span>
                <h1>
                    Membangun Generasi<br>
                    Berprestasi & Berkarakter
                </h1>
                <p>
                    Website resmi {{ $profil->nama_sekolah ?? 'sekolah kami' }} —
                    pusat informasi, berita terkini, kegiatan, dan prestasi siswa-siswi terbaik.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#profil" class="btn btn-light btn-hero text-primary">
                        <i class="bi bi-info-circle me-2"></i> Tentang Sekolah
                    </a>
                    <a href="#berita" class="btn btn-outline-light btn-hero">
                        <i class="bi bi-newspaper me-2"></i> Berita Terbaru
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center">
                @if(!empty($profil->logo))
                    <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                         alt="Logo"
                         style="max-width: 320px; max-height: 320px; object-fit: contain; opacity: 0.9;">
                @else
                    <i class="bi bi-mortarboard-fill hero-icon" style="font-size: 16rem;"></i>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ============ STATS ============ --}}
<section class="stats-section">
    <div class="container">
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <i class="bi bi-people-fill"></i>
                    <h3>{{ $totalSiswa ?? 0 }}</h3>
                    <p>Total Siswa</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <i class="bi bi-person-badge-fill"></i>
                    <h3>{{ $totalGuru ?? 0 }}</h3>
                    <p>Total Guru</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <i class="bi bi-trophy-fill"></i>
                    <h3>{{ $totalEkskul ?? 0 }}</h3>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <i class="bi bi-award-fill"></i>
                    <h3>{{ $totalPrestasi ?? 0 }}</h3>
                    <p>Prestasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ PROFIL ============ --}}
<section class="section" id="profil">
    <div class="container">
        <div class="section-title">
            <h2>Tentang Sekolah</h2>
            <p>Mengenal lebih dekat sekolah kami</p>
            <div class="divider"></div>
        </div>

        <div class="row align-items-center g-5">
            {{-- Foto Sekolah (hanya kalau ada) --}}
            <div class="col-lg-5">
                @if(!empty($profil->foto))
                    <img src="{{ asset('uploads/profil/' . $profil->foto) }}"
                         alt="{{ $profil->nama_sekolah ?? 'Sekolah' }}"
                         class="profil-img">
                @endif
            </div>

            <div class="col-lg-7">
                <div class="profil-content">
                    {{-- Logo + Nama --}}
                    <div class="d-flex align-items-center gap-3 mb-3">
                        @if(!empty($profil->logo))
                            <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                                 alt="Logo"
                                 style="width: 56px; height: 56px; object-fit: contain;">
                        @endif
                        <h3 class="mb-0">{{ $profil->nama_sekolah ?? '' }}</h3>
                    </div>

                    {{-- Deskripsi (hanya kalau ada) --}}
                    @if(!empty($profil->deskripsi))
                        <p>{{ $profil->deskripsi }}</p>
                    @endif

                    {{-- Info tambahan (hanya tampil kalau ada datanya) --}}
                    @if(!empty($profil->npsn) || !empty($profil->kepala_sekolah) || !empty($profil->tahun_berdiri))
                        <div class="row g-3 mt-3">
                            @if(!empty($profil->npsn))
                                <div class="col-6 col-md-4">
                                    <small class="text-muted d-block">NPSN</small>
                                    <strong>{{ $profil->npsn }}</strong>
                                </div>
                            @endif

                            @if(!empty($profil->kepala_sekolah))
                                <div class="col-6 col-md-4">
                                    <small class="text-muted d-block">Kepala Sekolah</small>
                                    <strong>{{ $profil->kepala_sekolah }}</strong>
                                </div>
                            @endif

                            @if(!empty($profil->tahun_berdiri))
                                <div class="col-6 col-md-4">
                                    <small class="text-muted d-block">Tahun Berdiri</small>
                                    <strong>{{ $profil->tahun_berdiri }}</strong>
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Visi Misi (hanya kalau ada) --}}
                    @if(!empty($profil->visi_misi))
                        <div class="mt-4 p-3 rounded profil-info-box">
                            <small class="text-muted d-block mb-2 fw-semibold">VISI & MISI</small>
                            <p class="mb-0 small" style="white-space: pre-line;">{{ $profil->visi_misi }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ BERITA ============ --}}
<section class="section bg-light" id="berita">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p>Informasi dan kegiatan terkini dari sekolah</p>
            <div class="divider"></div>
        </div>

        <div class="row g-4">
            @forelse($berita ?? [] as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="content-card">
                        <img src="{{ $item->gambar ? asset('uploads/berita/' . $item->gambar) : 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600' }}"
                             alt="{{ $item->judul }}">
                        <div class="card-body">
                            <div class="card-meta">
                                <span>
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </span>
                            </div>
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                            <a href="#" class="link-more">
                                Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-newspaper fs-1 d-block mb-3 opacity-25"></i>
                    <p class="mb-0">Belum ada berita.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ============ GALERI ============ --}}
<section class="section" id="galeri">
    <div class="container">
        <div class="section-title">
            <h2>Galeri Sekolah</h2>
            <p>Momen dan kegiatan seru di sekolah kami</p>
            <div class="divider"></div>
        </div>

        <div class="row g-3">
            @forelse($galeri ?? [] as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="galeri-item">
                        <img src="{{ asset('uploads/galeri/' . $item->file) }}" alt="{{ $item->judul }}">
                        <div class="overlay"><p>{{ $item->judul }}</p></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-images fs-1 d-block mb-3 opacity-25"></i>
                    <p class="mb-0">Belum ada foto galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ============ CTA ============ --}}
<section class="section pt-0">
    <div class="container">
        <div class="cta-section">
            <h2>Bergabunglah Bersama Kami</h2>
            <p>Daftarkan diri Anda dan menjadi bagian dari keluarga besar sekolah kami</p>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg px-4">
                    <i class="bi bi-speedometer2 me-2"></i> Buka Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login Sekarang
                </a>
            @endauth
        </div>
    </div>
</section>

@endsection