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
    // Tentukan anchor sesuai route yang dibuka
    $routeName = request()->route()->getName();

    $anchor = match(true) {
        str_starts_with($routeName, 'tampil.berita')     => '#berita',
        str_starts_with($routeName, 'tampil.ekskul')     => '#ekskul',
        str_starts_with($routeName, 'tampil.galeri')     => '#galeri',
        str_starts_with($routeName, 'tampil.prestasi')   => '#prestasi',
        str_starts_with($routeName, 'tampil.pengumuman') => '#pengumuman',
        str_starts_with($routeName, 'tampil.guru')       => '#guru',
        $routeName === 'tampil.profil'                   => '#profil',
        default => '',
    };
@endphp

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('landing.index') }}">
            @if($profil?->logo)
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                     style="width:40px;height:40px;object-fit:contain;">
            @endif
            <span>{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</span>
        </a>
        <a href="{{ route('landing.index') . $anchor }}" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda
        </a>
    </div>
</nav>

{{-- HEADER --}}
<div class="py-4 border-bottom" style="background: linear-gradient(135deg, #0284c7 0%, #075985 100%);">
    <div class="container">
        <h1 class="h3 fw-bold mb-1 text-white">@yield('title')</h1>
        <p class="mb-0" style="color: #bae6fd;">@yield('subtitle')</p>
    </div>
</div>

{{-- KONTEN --}}
<div class="container py-5">
    @yield('content')
</div>

{{-- FOOTER --}}
@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
