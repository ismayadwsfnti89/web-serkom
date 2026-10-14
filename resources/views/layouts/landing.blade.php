<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website Resmi ' . ($profil?->nama_sekolah ?? 'Sekolah'))">
    <title>@yield('title', 'Beranda') - {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/warna-sekolah.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .navbar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        .hero-section {
            background: linear-gradient(135deg, #0284c7 0%, #075985 100%);
            color: #fff;
        }
        html {
            scroll-behavior: smooth;
        }
        .hero-slide {
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.55) 0%, rgba(7, 89, 133, 0.70) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .navbar-nav .nav-link {
            position: relative;
            transition: color 0.2s;
            padding-bottom: 6px;
        }
        .navbar-nav .nav-link:hover {
            color: #0284c7;
        }
        .navbar-nav .nav-link.active {
            color: #0284c7 !important;
            font-weight: 600;
        }
        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 8px;
            right: 8px;
            height: 3px;
            background: #0284c7;
            border-radius: 3px;
        }
        .dropdown-menu {
            border: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 8px;
        }
        .dropdown-item {
            padding: 8px 20px;
            font-size: 0.9rem;
        }
        .dropdown-item:hover {
            background-color: #e0f2fe;
            color: #0284c7;
        }
        .dropdown-item.active {
            background-color: #0284c7;
            color: #fff;
        }
        .visi-misi-card {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-left: 5px solid #0284c7 !important;
        }
        .visi-misi-card .card-body {
            padding: 24px;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }
        .card img {
            transition: transform 0.5s ease;
        }
        .card:hover img {
            transform: scale(1.05);
        }
        .badge {
            transition: transform 0.2s;
        }
        .badge:hover {
            transform: scale(1.05);
        }
        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('landing.index') }}">
            @if($profil?->logo)
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
            @else
                <span class="badge bg-danger p-2 rounded-3">
                    <i class="bi bi-mortarboard-fill fs-5"></i>
                </span>
            @endif
            <span>{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLanding">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navLanding">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('landing.index') ? 'active' : '' }}"
                       href="{{ route('landing.index') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tampil.profil') ? 'active' : '' }}"
                       href="{{ route('tampil.profil') }}">Profil</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('tampil.guru', 'tampil.siswa', 'tampil.ekskul*') ? 'active' : '' }}"
                       href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Data
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('tampil.guru') ? 'active' : '' }}"
                               href="{{ route('tampil.guru') }}">Guru</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('tampil.siswa') ? 'active' : '' }}"
                               href="{{ route('tampil.siswa') }}">Siswa</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('tampil.ekskul*') ? 'active' : '' }}"
                               href="{{ route('tampil.ekskul') }}">Ekstrakurikuler</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('tampil.berita*', 'tampil.prestasi*', 'tampil.pengumuman*') ? 'active' : '' }}"
                       href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('tampil.berita*') ? 'active' : '' }}"
                               href="{{ route('tampil.berita') }}">Berita</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('tampil.prestasi*') ? 'active' : '' }}"
                               href="{{ route('tampil.prestasi') }}">Prestasi</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('tampil.pengumuman*') ? 'active' : '' }}"
                               href="{{ route('tampil.pengumuman') }}">Pengumuman</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tampil.galeri*') ? 'active' : '' }}"
                       href="{{ route('tampil.galeri') }}">Galeri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tampil.pencipta') ? 'active' : '' }}"
                       href="{{ route('tampil.pencipta') }}">Profil Saya</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

@yield('content')

@include('layouts.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script>
    AOS.init({
        duration: 700,
        once: true,
        offset: 100,
    });
</script>

@stack('scripts')
</body>
</html>