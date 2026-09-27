<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Sekolah - Informasi, Berita, dan Kegiatan">
    <title>Beranda - Web Sekolah</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --dark: #1f2937;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: #1f2937;
            overflow-x: hidden;
        }

        /* ============ NAVBAR ============ */
        .landing-navbar {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        .landing-navbar .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .landing-navbar .navbar-brand i {
            color: var(--primary);
            font-size: 1.5rem;
        }
        .landing-navbar .nav-link {
            color: #4b5563;
            font-weight: 500;
            padding: 8px 16px !important;
            transition: color 0.2s;
        }
        .landing-navbar .nav-link:hover,
        .landing-navbar .nav-link.active {
            color: var(--primary);
        }

        /* ============ HERO ============ */
        .hero {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: #fff;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        .hero p {
            font-size: 1.125rem;
            opacity: 0.95;
            margin-bottom: 32px;
            max-width: 600px;
        }
        .hero .btn-hero {
            padding: 12px 32px;
            font-weight: 600;
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .hero .btn-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* ============ STATS ============ */
        .stats-section {
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }
        .stat-box {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }
        .stat-box:hover {
            transform: translateY(-4px);
        }
        .stat-box i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 12px;
        }
        .stat-box h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }
        .stat-box p {
            color: #6b7280;
            font-size: 0.875rem;
            margin: 0;
        }

        /* ============ SECTION ============ */
        .section {
            padding: 80px 0;
        }
        .section-title {
            text-align: center;
            margin-bottom: 48px;
        }
        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }
        .section-title p {
            color: #6b7280;
            max-width: 600px;
            margin: 0 auto;
        }
        .section-title .divider {
            width: 60px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
            margin: 16px auto 0;
        }

        /* ============ PROFIL ============ */
        .profil-img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        .profil-content h3 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .profil-content p {
            color: #4b5563;
            line-height: 1.8;
            margin-bottom: 16px;
        }
        .profil-content ul {
            list-style: none;
            padding: 0;
        }
        .profil-content ul li {
            padding: 8px 0;
            color: #4b5563;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .profil-content ul li i {
            color: var(--primary);
            font-size: 1.25rem;
        }

        /* ============ CARD ============ */
        .content-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }
        .content-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }
        .content-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .content-card .card-body {
            padding: 20px;
        }
        .content-card .card-meta {
            font-size: 0.75rem;
            color: #6b7280;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .content-card .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .content-card .card-text {
            font-size: 0.875rem;
            color: #6b7280;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 12px;
        }
        .content-card a.link-more {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.875rem;
        }
        .content-card a.link-more:hover {
            color: var(--primary-dark);
        }

        /* ============ GALERI ============ */
        .galeri-item {
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            aspect-ratio: 1;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s;
        }
        .galeri-item:hover {
            transform: scale(1.03);
        }
        .galeri-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .galeri-item .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent 60%);
            opacity: 0;
            transition: opacity 0.2s;
            display: flex;
            align-items: flex-end;
            padding: 16px;
        }
        .galeri-item:hover .overlay {
            opacity: 1;
        }
        .galeri-item .overlay p {
            color: #fff;
            font-weight: 600;
            margin: 0;
            font-size: 0.9rem;
        }

        /* ============ CTA ============ */
        .cta-section {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: #fff;
            padding: 60px 0;
            border-radius: 16px;
            text-align: center;
        }
        .cta-section h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .cta-section p {
            opacity: 0.95;
            margin-bottom: 24px;
        }

        /* ============ FOOTER ============ */
        .landing-footer {
            background: #1f2937;
            color: #d1d5db;
            padding: 48px 0 24px;
        }
        .landing-footer h5 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .landing-footer p, .landing-footer a {
            color: #d1d5db;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .landing-footer a:hover {
            color: #fff;
        }
        .landing-footer ul {
            list-style: none;
            padding: 0;
        }
        .landing-footer ul li {
            margin-bottom: 8px;
        }
        .landing-footer .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #374151;
            border-radius: 50%;
            margin-right: 8px;
            transition: background 0.2s;
        }
        .landing-footer .social-links a:hover {
            background: var(--primary);
        }
        .landing-footer .copyright {
            border-top: 1px solid #374151;
            padding-top: 24px;
            margin-top: 24px;
            text-align: center;
            font-size: 0.85rem;
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .hero { padding: 60px 0 40px; }
            .section { padding: 48px 0; }
            .stats-section { margin-top: 20px; }
        }
    </style>
</head>
<body>

{{-- ============ NAVBAR ============ --}}
<nav class="landing-navbar navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <i class="bi bi-mortarboard-fill"></i>
            Web Sekolah
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navLanding">
            <i class="bi bi-list fs-3"></i>
        </button>

        <div class="collapse navbar-collapse" id="navLanding">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

                {{-- Tombol Login / Dashboard --}}
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary w-100">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ============ HERO ============ --}}
<section class="hero" id="beranda">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill">
                    <i class="bi bi-star-fill me-1"></i> Selamat Datang
                </span>
                <h1>Membangun Generasi<br>Berprestasi & Berkarakter</h1>
                <p>
                    Website resmi sekolah kami — pusat informasi, berita terkini,
                    kegiatan, dan prestasi siswa-siswi terbaik.
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
                <i class="bi bi-mortarboard-fill" style="font-size: 16rem; opacity: 0.15;"></i>
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
            <div class="col-lg-5">
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=800"
                     alt="Sekolah" class="profil-img">
            </div>
            <div class="col-lg-7">
                <div class="profil-content">
                    <h3>{{ $profil->nama_sekolah ?? 'Web Sekolah' }}</h3>
                    <p>
                        {{ $profil->deskripsi ?? 'Sekolah kami berkomitmen untuk memberikan pendidikan terbaik bagi generasi penerus bangsa. Dengan tenaga pengajar profesional dan fasilitas lengkap, kami siap mencetak lulusan yang berprestasi dan berkarakter.' }}
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Kurikulum terbaru & relevan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Tenaga pengajar berpengalaman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Fasilitas modern & lengkap</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Berbagai prestasi tingkat nasional</span>
                        </li>
                    </ul>
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
                                <span><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
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
                {{-- Dummy berita untuk tampilan awal --}}
                <div class="col-md-6 col-lg-4">
                    <div class="content-card">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600" alt="Berita">
                        <div class="card-body">
                            <div class="card-meta">
                                <span><i class="bi bi-calendar3 me-1"></i>{{ date('d M Y') }}</span>
                            </div>
                            <h5 class="card-title">Selamat Datang di Website Sekolah</h5>
                            <p class="card-text">Website resmi sekolah kini telah hadir dengan tampilan baru yang lebih modern dan informatif.</p>
                            <a href="#" class="link-more">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        @if(isset($berita) && count($berita) > 0)
            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary px-4">
                    Lihat Semua Berita <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        @endif
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
                        <div class="overlay">
                            <p>{{ $item->judul }}</p>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Dummy galeri --}}
                @foreach([
                    'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400',
                    'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=400',
                    'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=400',
                    'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=400',
                    'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=400',
                    'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400',
                    'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=400',
                    'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=400',
                ] as $url)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="galeri-item">
                            <img src="{{ $url }}" alt="Galeri">
                            <div class="overlay">
                                <p>Kegiatan Sekolah</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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

{{-- ============ FOOTER ============ --}}
<footer class="landing-footer" id="kontak">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5><i class="bi bi-mortarboard-fill me-2"></i>Web Sekolah</h5>
                <p>
                    Website resmi sekolah kami. Pusat informasi, berita, dan
                    kegiatan untuk siswa, guru, dan orang tua.
                </p>
                <div class="social-links mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <h5>Menu</h5>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <h5>Kontak</h5>
                <ul>
                    <li><i class="bi bi-geo-alt me-2"></i>{{ $profil->alamat ?? 'Jl. Pendidikan No. 1, Indonesia' }}</li>
                    <li><i class="bi bi-telephone me-2"></i>{{ $profil->kontak ?? '(021) 1234567' }}</li>
                    <li><i class="bi bi-envelope me-2"></i>info@sekolah.sch.id</li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <h5>Jam Operasional</h5>
                <ul>
                    <li>Senin - Jumat: 07.00 - 15.00</li>
                    <li>Sabtu: 07.00 - 12.00</li>
                    <li>Minggu: Libur</li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} Web Sekolah. All rights reserved. |
            Built with <i class="bi bi-heart-fill text-danger"></i> for education
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
