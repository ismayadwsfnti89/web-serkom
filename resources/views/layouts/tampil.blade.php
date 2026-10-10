<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/warna-sekolah.css') }}" rel="stylesheet">
</head>
<body class="bg-white">

@php
    // Tentukan anchor sesuai route yang sedang dibuka
    $currentRoute = request()->route()->getName();
    $anchor = match($currentRoute) {
        'tampil.berita', 'tampil.berita.detail'       => '#berita',
        'tampil.ekskul', 'tampil.ekskul.detail'       => '#ekskul',
        'tampil.galeri', 'tampil.galeri.detail'       => '#galeri',
        'tampil.prestasi', 'tampil.prestasi.detail'   => '#prestasi',
        'tampil.pengumuman', 'tampil.pengumuman.detail' => '#pengumuman',
        'tampil.guru' => '#guru',
        default => '',
    };
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('landing.index') }}">
            @if($profil?->logo)
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}" style="width:40px;height:40px;object-fit:contain;">
            @endif
            <span>{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</span>
        </a>
        <a href="{{ route('landing.index') }}{{ $anchor }}" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </div>
</nav>

<div class="py-4 border-bottom" style="background: linear-gradient(135deg, #0284c7 0%, #075985 100%);">
    <div class="container">
        <h1 class="h3 fw-bold mb-1 text-white">@yield('title')</h1>
        <p class="mb-0" style="color: #bae6fd;">@yield('subtitle')</p>
    </div>
</div>

<div class="container py-5">
    @yield('content')
</div>

<footer class="bg-dark text-secondary py-4 mt-5">
    <div class="container text-center small">
        &copy; {{ date('Y') }} {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}. All rights reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
