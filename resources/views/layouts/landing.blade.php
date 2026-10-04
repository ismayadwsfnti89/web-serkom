<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website Resmi Sekolah')">

    <title>@yield('title', 'Beranda') - {{ $profil->nama_sekolah ?? 'SDN 4 MANONJAYA' }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            /* ==== Palet MERAH ==== */
            --primary: #b91c1c;          /* merah utama */
            --primary-dark: #7f1d1d;     /* merah tua (hover) */
            --primary-light: #fef2f2;    /* merah sangat muda (bg) */
            --accent: #f59e0b;           /* aksen kuning/orange */
            --dark: #1f2937;
            --gray: #6b7280;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--dark);
            overflow-x: hidden;
            background: #fff;
        }

        /* ============ NAVBAR ============ */
        .landing-navbar {
            background: #fff;
            box-shadow: 0 1px 5px rgba(0,0,0,0.08);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            border-bottom: 3px solid var(--primary);
        }
        .landing-navbar .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .landing-navbar .navbar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
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
        .landing-navbar .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }
        .landing-navbar .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        .navbar-toggler { color: var(--primary); }

        /* ============ HERO ============ */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
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
        .hero .badge { color: var(--primary) !important; }
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
        .hero .btn-outline-light:hover { color: var(--primary); background: #fff; }
        .hero-icon { color: rgba(255,255,255,0.15); }

        /* ============ STATS ============ */
        .stats-section { margin-top: -50px; position: relative; z-index: 10; }
        .stat-box {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.2s, border-color 0.2s;
            border-top: 3px solid transparent;
        }
        .stat-box:hover { transform: translateY(-4px); border-top-color: var(--primary); }
        .stat-box i { font-size: 2rem; color: var(--primary); margin-bottom: 12px; }
        .stat-box h3 { font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 4px; }
        .stat-box p { color: var(--gray); font-size: 0.875rem; margin: 0; }

        /* ============ SECTION ============ */
        .section { padding: 80px 0; }
        .section-title { text-align: center; margin-bottom: 48px; }
        .section-title h2 { font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 12px; }
        .section-title p { color: var(--gray); max-width: 600px; margin: 0 auto; }
        .section-title .divider {
            width: 60px; height: 4px;
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
        .profil-content h3 { font-size: 1.75rem; font-weight: 700; margin-bottom: 16px; }
        .profil-content p { color: #4b5563; line-height: 1.8; margin-bottom: 16px; }
        .profil-content ul { list-style: none; padding: 0; }
        .profil-content ul li {
            padding: 8px 0; color: #4b5563;
            display: flex; align-items: center; gap: 12px;
        }
        .profil-content ul li i { color: var(--primary); font-size: 1.25rem; }
        .profil-info-box {
            background: var(--primary-light);
            border-left: 4px solid var(--primary);
        }

        /* ============ CARD BERITA ============ */
        .content-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
            border-top: 3px solid transparent;
        }
        .content-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            border-top-color: var(--primary);
        }
        .content-card img { width: 100%; height: 200px; object-fit: cover; }
        .content-card .card-body { padding: 20px; }
        .content-card .card-meta {
            font-size: 0.75rem; color: var(--gray);
            margin-bottom: 8px;
            display: flex; align-items: center; gap: 12px;
        }
        .content-card .card-meta i { color: var(--primary); }
        .content-card .card-title {
            font-size: 1.1rem; font-weight: 700;
            margin-bottom: 8px; color: var(--dark);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .content-card .card-text {
            font-size: 0.875rem; color: var(--gray);
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
        .content-card a.link-more:hover { color: var(--primary-dark); }

        /* ============ GALERI ============ */
        .galeri-item {
            border-radius: 12px; overflow: hidden;
            position: relative; aspect-ratio: 1;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s;
        }
        .galeri-item:hover { transform: scale(1.03); }
        .galeri-item img { width: 100%; height: 100%; object-fit: cover; }
        .galeri-item .overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(185,28,28,0.85), transparent 60%);
            opacity: 0;
            transition: opacity 0.2s;
            display: flex; align-items: flex-end; padding: 16px;
        }
        .galeri-item:hover .overlay { opacity: 1; }
        .galeri-item .overlay p { color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem; }

        /* ============ CTA ============ */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            padding: 60px 0;
            border-radius: 16px;
            text-align: center;
        }
        .cta-section h2 { font-size: 1.75rem; font-weight: 700; margin-bottom: 12px; }
        .cta-section p { opacity: 0.95; margin-bottom: 24px; }
        .cta-section .btn-light { color: var(--primary); font-weight: 600; }
        .cta-section .btn-light:hover { color: var(--primary-dark); }

        /* ============ FOOTER ============ */
        .landing-footer {
            background: #1f2937;
            color: #d1d5db;
            padding: 48px 0 24px;
        }
        .landing-footer h5 { color: #fff; font-weight: 700; margin-bottom: 16px; }
        .landing-footer h5 i { color: var(--primary); }
        .landing-footer h5 img {
            width: 28px; height: 28px;
            object-fit: contain;
            margin-right: 6px;
        }
        .landing-footer p, .landing-footer a {
            color: #d1d5db; text-decoration: none; font-size: 0.9rem;
        }
        .landing-footer a:hover { color: #fff; }
        .landing-footer ul { list-style: none; padding: 0; }
        .landing-footer ul li { margin-bottom: 8px; }
        .landing-footer ul li i { color: var(--primary); }
        .landing-footer .social-links a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px;
            background: #374151; border-radius: 50%;
            margin-right: 8px;
            transition: background 0.2s, transform 0.2s;
        }
        .landing-footer .social-links a:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }
        .landing-footer .copyright {
            border-top: 1px solid #374151;
            padding-top: 24px; margin-top: 24px;
            text-align: center; font-size: 0.85rem;
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .hero { padding: 60px 0 40px; }
            .section { padding: 48px 0; }
            .stats-section { margin-top: 20px; }
            .stat-box { padding: 20px 12px; }
            .stat-box h3 { font-size: 1.5rem; }
            .landing-navbar .nav-link { padding: 8px 10px !important; }
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ============ NAVBAR ============ --}}
<nav class="landing-navbar navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            @if(!empty($profil->logo))
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
            @else
                <i class="bi bi-mortarboard-fill"></i>
            @endif
            {{ $profil->nama_sekolah ?? 'Web Sekolah' }}
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

{{-- ============ KONTEN ============ --}}
@yield('content')

{{-- ============ FOOTER ============ --}}
<footer class="landing-footer" id="kontak">
    <div class="container">
        <div class="row g-4">

            {{-- Kolom 1: Brand + Deskripsi --}}
            <div class="col-lg-4">
                <h5>
                    @if(!empty($profil->logo))
                        <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
                    @else
                        <i class="bi bi-mortarboard-fill me-2"></i>
                    @endif
                    {{ $profil->nama_sekolah ?? ' Web Sekolah' }}
                </h5>
                @if(!empty($profil->deskripsi))
                    <p>{{ Str::limit($profil->deskripsi, 150) }}</p>
                @endif
                <div class="social-links mt-3">
                    <a href="#"><i class="bi bi-envelope"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            {{-- Kolom 2: Menu --}}
            <div class="col-lg-2 col-md-4">
                <h5>Menu</h5>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak (hanya tampil kalau ada data) --}}
            <div class="col-lg-3 col-md-4">
                <h5>Kontak</h5>
                <ul>
                    @if(!empty($profil->alamat))
                        <li><i class="bi bi-geo-alt me-2"></i>{{ $profil->alamat }}</li>
                    @endif
                    @if(!empty($profil->kontak))
                        <li><i class="bi bi-telephone me-2"></i>{{ $profil->kontak }}</li>
                    @endif
                    @if(!empty($profil->email))
                        <li><i class="bi bi-envelope me-2"></i>{{ $profil->email }}</li>
                    @endif

                    @if(empty($profil->alamat) && empty($profil->kontak) && empty($profil->email))
                        <li class="text-muted fst-italic">Belum ada info kontak</li>
                    @endif
                </ul>
            </div>

            {{-- Kolom 4: Jam Operasional --}}
            <div class="col-lg-3 col-md-4">
                <h5>Jam Operasional</h5>
                <ul>
                    <li>Senin - Kamis : 07.00 - 12.00</li>
                    <li>Jumat : 07.00 - 11.00</li>
                    <li>Sabtu - Minggu : Libur</li>
                </ul>
            </div>

        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} {{ $profil->nama_sekolah ?? 'Web Sekolah' }} | IT Team.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>