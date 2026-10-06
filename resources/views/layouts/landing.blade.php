<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website Resmi ' . ($profil->nama_sekolah ?? 'Sekolah'))">

    <title>@yield('title', 'Beranda') - {{ $profil->nama_sekolah ?? 'Web Sekolah' }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Google Fonts — biar gak keliatan AI --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            /* ====== Palet Kustom: Merah + Gold ====== */
            --primary: #a4161a;             /* merah maroon */
            --primary-dark: #6a0c0f;
            --primary-light: #fef2f2;
            --accent: #d4a017;              /* gold */
            --accent-dark: #b8860b;
            --accent-light: #fef9e7;

            --dark: #1a1a1a;
            --gray: #6b7280;
            --gray-light: #f8f9fa;
            --border: #e5e7eb;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--dark);
            overflow-x: hidden;
            background: #fff;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5 { font-family: 'Plus Jakarta Sans', sans-serif; }

        a { text-decoration: none; }

        /* ============ TOPBAR ============ */
        .topbar {
            background: var(--primary-dark);
            color: rgba(255,255,255,0.85);
            font-size: 0.8rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .topbar a { color: rgba(255,255,255,0.85); transition: color 0.2s; }
        .topbar a:hover { color: var(--accent); }
        .topbar i { color: var(--accent); margin-right: 6px; }
        .topbar .divider { color: rgba(255,255,255,0.2); margin: 0 12px; }

        /* ============ NAVBAR ============ */
        .main-navbar {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        .main-navbar .navbar-brand {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .main-navbar .navbar-brand img {
            width: 42px; height: 42px;
            object-fit: contain;
        }
        .main-navbar .navbar-brand .brand-icon {
            width: 42px; height: 42px;
            background: var(--primary);
            color: #fff;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }
        .main-navbar .navbar-brand .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .main-navbar .navbar-brand .brand-text small {
            font-size: 0.65rem;
            font-weight: 500;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .main-navbar .nav-link {
            color: #4b5563;
            font-weight: 500;
            padding: 8px 16px !important;
            font-size: 0.9rem;
            transition: color 0.2s;
        }
        .main-navbar .nav-link:hover,
        .main-navbar .nav-link.active {
            color: var(--primary);
        }
        .main-navbar .btn-login {
            background: var(--primary);
            color: #fff;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s;
        }
        .main-navbar .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(164, 22, 26, 0.25);
        }
        .main-navbar .btn-search {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--gray);
            width: 38px; height: 38px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .main-navbar .btn-search:hover {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        /* ============ SECTION ============ */
        .section {
            padding: 70px 0;
        }
        .section-title-wrap {
            margin-bottom: 40px;
        }
        .section-label {
            display: inline-block;
            color: var(--primary);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
            position: relative;
            padding-left: 32px;
        }
        .section-label::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            width: 24px; height: 2px;
            background: var(--accent);
            transform: translateY(-50%);
        }
        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 10px;
        }
        .section-subtitle {
            color: var(--gray);
            font-size: 0.95rem;
            max-width: 600px;
        }
        .section-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 16px;
        }
        .section-link {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.2s;
        }
        .section-link:hover {
            color: var(--primary-dark);
            gap: 10px;
        }

        /* ============ FOOTER ============ */
        .landing-footer {
            background: #14161a;
            color: #9ca3af;
            padding: 60px 0 0;
        }
        .landing-footer h5 {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        .landing-footer h5::after {
            content: '';
            position: absolute;
            left: 0; bottom: 0;
            width: 32px; height: 2px;
            background: var(--accent);
        }
        .landing-footer p,
        .landing-footer a {
            color: #9ca3af;
            font-size: 0.875rem;
            line-height: 1.7;
            transition: color 0.2s;
        }
        .landing-footer a:hover { color: var(--accent); }
        .landing-footer ul { list-style: none; padding: 0; }
        .landing-footer ul li { margin-bottom: 10px; }
        .landing-footer ul li i {
            color: var(--accent);
            margin-right: 8px;
            width: 16px;
        }
        .landing-footer .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px; height: 38px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            margin-right: 8px;
            transition: all 0.2s;
        }
        .landing-footer .social-links a:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            transform: translateY(-2px);
        }
        .landing-footer .copyright {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding: 20px 0;
            margin-top: 40px;
            text-align: center;
            font-size: 0.8rem;
        }

        /* ============ BACK TO TOP ============ */
        .back-to-top {
            position: fixed;
            right: 24px;
            bottom: 24px;
            width: 44px; height: 44px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 6px 20px rgba(164, 22, 26, 0.3);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s;
            z-index: 999;
        }
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .back-to-top:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(164, 22, 26, 0.4);
        }

        /* ============ SEARCH MODAL ============ */
        .search-modal .modal-content {
            border-radius: 12px;
            border: none;
        }
        .search-modal .modal-header {
            border-bottom: 1px solid var(--border);
        }
        .search-modal input {
            border: none;
            font-size: 1.1rem;
            padding: 8px 0;
        }
        .search-modal input:focus {
            box-shadow: none;
            border-color: transparent;
        }

        /* ============ SCROLL ANIMATION ============ */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 991.98px) {
            .section-title { font-size: 1.6rem; }
            .topbar { display: none; }
        }
        @media (max-width: 767.98px) {
            .section { padding: 48px 0; }
            .section-title { font-size: 1.4rem; }
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ============ NAVBAR ============ --}}
<div class="collapse navbar-collapse" id="navLanding">
    <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="#sambutan">Sambutan</a></li>
        <li class="nav-item"><a class="nav-link" href="#guru">Guru</a></li>
        <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="#prestasi">Prestasi</a></li>
        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

        {{-- Tombol Search --}}
        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
            <button class="btn-search" data-bs-toggle="modal" data-bs-target="#searchModal" title="Cari">
                <i class="bi bi-search"></i>
            </button>
        </li>

        {{-- Tombol Dashboard — HANYA muncul kalau admin login --}}
        @auth
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                <a href="{{ route('dashboard') }}" class="btn-login">
                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                </a>
            </li>
        @endauth
    </ul>
</div>

{{-- ============ KONTEN ============ --}}
@yield('content')

{{-- ============ FOOTER ============ --}}
<footer class="landing-footer" id="kontak">
    <div class="container">
        <div class="row g-4">

            {{-- Kolom 1: Brand --}}
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-3 mb-3">
                    @if(!empty($profil->logo))
                        <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                             alt="Logo"
                             style="width: 48px; height: 48px; object-fit: contain;">
                    @else
                        <span style="display: inline-flex; width: 48px; height: 48px; background: var(--primary); border-radius: 10px; align-items: center; justify-content: center; color: #fff; font-size: 1.4rem;">
                            <i class="bi bi-mortarboard-fill"></i>
                        </span>
                    @endif
                    <h5 class="mb-0" style="padding-bottom: 0;">
                        {{ $profil->nama_sekolah ?? 'Web Sekolah' }}
                    </h5>
                </div>
                @if(!empty($profil->deskripsi))
                    <p>{{ Str::limit($profil->deskripsi, 180) }}</p>
                @endif
                <div class="social-links mt-3">
                    <a href="#"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

            {{-- Kolom 2: Menu --}}
            <div class="col-lg-2 col-md-6">
                <h5>Menu</h5>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#prestasi">Prestasi</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div class="col-lg-3 col-md-6">
                <h5>Kontak</h5>
                <ul>
                    @if(!empty($profil->alamat))
                        <li><i class="bi bi-geo-alt-fill"></i>{{ $profil->alamat }}</li>
                    @endif
                    @if(!empty($profil->kontak))
                        <li><i class="bi bi-telephone-fill"></i>{{ $profil->kontak }}</li>
                    @endif
                    @if(!empty($profil->npsn))
                        <li><i class="bi bi-hash"></i>NPSN: {{ $profil->npsn }}</li>
                    @endif

                    @if(empty($profil->alamat) && empty($profil->kontak) && empty($profil->npsn))
                        <li class="fst-italic">Belum ada info kontak</li>
                    @endif
                </ul>
            </div>

            {{-- Kolom 4: Jam Operasional --}}
            <div class="col-lg-3 col-md-6">
                <h5>Jam Operasional</h5>
                <ul>
                    <li><i class="bi bi-clock-fill"></i>Senin - Kamis: 07.00 - 12.00</li>
                    <li><i class="bi bi-clock-fill"></i>Jumat: 07.00 - 11.00</li>
                    <li><i class="bi bi-clock-fill"></i>Sabtu - Minggu: Libur</li>
                </ul>
            </div>

        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} {{ $profil->nama_sekolah ?? 'Web Sekolah' }}. All rights reserved.
        </div>
    </div>
</footer>

{{-- ============ BACK TO TOP ============ --}}
<button class="back-to-top" id="backToTop" title="Kembali ke atas">
    <i class="bi bi-arrow-up"></i>
</button>

{{-- ============ SEARCH MODAL ============ --}}
<div class="modal fade search-modal" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold">
                    <i class="bi bi-search me-2"></i>Cari Informasi
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="#berita" method="GET">
                    <div class="d-flex align-items-center gap-2 border-bottom">
                        <i class="bi bi-search text-muted"></i>
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari berita, pengumuman..."
                               value="{{ request('search') }}" autofocus>
                        <button type="submit" class="btn btn-sm" style="background: var(--primary); color: #fff;">
                            Cari
                        </button>
                    </div>
                </form>
                <p class="text-muted small mt-3 mb-0">
                    <i class="bi bi-info-circle me-1"></i>
                    Ketik kata kunci untuk mencari berita atau pengumuman.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // ============ BACK TO TOP ============
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 400) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });
    backToTop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // ============ SMOOTH SCROLL (untuk browser lama) ============
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ============ FADE IN ON SCROLL ============
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));

    // ============ NAVBAR ACTIVE LINK ============
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.main-navbar .nav-link');
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    });
</script>

@stack('scripts')
</body>
</html>