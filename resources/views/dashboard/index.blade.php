@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@php
    // Sapaan berdasarkan jam
    $jam = now()->hour;
    $sapaan = $jam < 11 ? 'Selamat pagi'
            : ($jam < 15 ? 'Selamat siang'
            : ($jam < 18 ? 'Selamat sore' : 'Selamat malam'));

    // Nama panggilan (kata pertama aja)
    $namaLengkap = auth()->user()->nama ?? 'Admin';
    $namaPanggil = explode(' ', trim($namaLengkap))[0];
@endphp

<div class="container-fluid p-0">

    {{-- ============ HEADER ============ --}}
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">
                {{ $sapaan }}, {{ $namaPanggil }} 👋
            </h1>
            <p class="text-muted small mb-0">
                Semoga harimu menyenangkan. Ini ringkasan data sekolah hari ini.
            </p>
        </div>

        <div class="text-end">
            <div class="badge rounded-pill px-3 py-2"
                 style="background: var(--primary-light); color: var(--primary); font-weight: 500;">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->locale('id')->translatedFormat('l, d F Y') }}
            </div>
            <div class="small text-muted mt-2">
                <i class="bi bi-clock me-1"></i>
                {{ now()->format('H:i') }} WIB
            </div>
        </div>
    </div>

    {{-- ============ ALERT PROFIL ============ --}}
    @if(!$profilLengkap)
        <div class="alert d-flex align-items-center gap-3 mb-4 border-0"
             style="background: var(--primary-light); color: var(--primary-dark);">
            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            <div class="flex-grow-1 small">
                <strong>Profil sekolah belum lengkap.</strong>
                Isi dulu supaya data tampil maksimal di website.
            </div>
            <a href="{{ route('profil.edit') }}"
               class="btn btn-sm text-white"
               style="background: var(--primary);">
                Isi Sekarang
            </a>
        </div>
    @endif

    {{-- ============ STATISTIK (4 kolom simetris) ============ --}}
    <div class="row g-3 mb-3">

        {{-- Card: Total Siswa --}}
        <div class="col-6 col-lg-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stats-card-label">Total Siswa</div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 44px; height: 44px; background: var(--primary-light); color: var(--primary);">
                        <i class="bi bi-people-fill fs-5"></i>
                    </div>
                </div>
                <div class="stats-card-value">{{ $totalSiswa }}</div>
                @if($siswaBaru > 0)
                    <div class="small mt-2 fw-medium" style="color: var(--primary);">
                        <i class="bi bi-arrow-up-short"></i>{{ $siswaBaru }} siswa baru tahun ini
                    </div>
                @endif
            </div>
        </div>

        {{-- Card: Guru --}}
        <div class="col-6 col-lg-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stats-card-label">Guru</div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 44px; height: 44px; background: var(--primary-light); color: var(--primary);">
                        <i class="bi bi-person-badge-fill fs-5"></i>
                    </div>
                </div>
                <div class="stats-card-value">{{ $totalGuru }}</div>
            </div>
        </div>

        {{-- Card: Ekstrakurikuler --}}
        <div class="col-6 col-lg-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stats-card-label">Ekstrakurikuler</div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 44px; height: 44px; background: var(--primary-light); color: var(--primary);">
                        <i class="bi bi-trophy-fill fs-5"></i>
                    </div>
                </div>
                <div class="stats-card-value">{{ $totalEkskul }}</div>
            </div>
        </div>

        {{-- Card: Prestasi --}}
        <div class="col-6 col-lg-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stats-card-label">Prestasi</div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 44px; height: 44px; background: var(--primary-light); color: var(--primary);">
                        <i class="bi bi-award-fill fs-5"></i>
                    </div>
                </div>
                <div class="stats-card-value">{{ $totalPrestasi }}</div>
            </div>
        </div>

    </div>

    {{-- ============ INFO BANNER (full width) ============ --}}
    <div class="mb-4">
        <div class="p-4 rounded-3 text-white position-relative overflow-hidden"
             style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
            <i class="bi bi-info-circle position-absolute"
               style="font-size: 10rem; opacity: 0.08; right: 20px; top: 50%; transform: translateY(-50%;)"></i>
            <div class="d-flex align-items-center gap-3 position-relative">
                <i class="bi bi-lightbulb-fill fs-4" style="color: rgba(255,255,255,0.85);"></i>
                <div>
                    <div class="fw-semibold small mb-1" style="color: rgba(255,255,255,0.9);">
                        Info Singkat
                    </div>
                    <div class="small" style="color: rgba(255,255,255,0.8);">
                        Kelola semua data sekolah lewat menu di sidebar. Setiap perubahan otomatis tersimpan.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ AKSI CEPAT ============ --}}
    <div class="mb-2">
        <h2 class="h6 fw-bold text-dark mb-3 d-flex align-items-center gap-2">
            <i class="bi bi-lightning-charge-fill" style="color: var(--primary);"></i>
            Aksi Cepat
        </h2>

        <div class="row g-3">
            @foreach([
                ['label' => 'Tambah Siswa',    'desc' => 'Input data siswa baru',  'route' => 'siswa.index',    'icon' => 'bi-people'],
                ['label' => 'Tambah Guru',     'desc' => 'Input data guru baru',   'route' => 'guru.index',     'icon' => 'bi-person-badge'],
                ['label' => 'Tambah Ekskul',   'desc' => 'Daftarkan ekskul baru',  'route' => 'ekskul.index',   'icon' => 'bi-trophy'],
                ['label' => 'Tambah Prestasi', 'desc' => 'Catat prestasi siswa',   'route' => 'prestasi.index', 'icon' => 'bi-award'],
            ] as $aksi)
                <div class="col-6 col-md-3">
                    <a href="{{ route($aksi['route']) }}"
                       class="d-block text-decoration-none bg-white border rounded-3 p-3 h-100 aksi-card">
                        <div class="d-flex align-items-center justify-content-center rounded-2 mb-3"
                             style="width: 36px; height: 36px; background: var(--primary-light); color: var(--primary);">
                            <i class="bi {{ $aksi['icon'] }}"></i>
                        </div>
                        <div class="small fw-semibold text-dark mb-1">{{ $aksi['label'] }}</div>
                        <div class="text-muted" style="font-size: 0.75rem;">{{ $aksi['desc'] }}</div>
                        <i class="bi bi-arrow-right aksi-arrow"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>

@push('styles')
<style>
    .aksi-card {
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .aksi-card:hover {
        border-color: var(--primary) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(185, 28, 28, 0.12);
    }
    .aksi-card .aksi-arrow {
        position: absolute;
        right: 16px;
        bottom: 16px;
        color: var(--primary);
        opacity: 0;
        transform: translateX(-6px);
        transition: all 0.2s ease;
        font-size: 1.1rem;
    }
    .aksi-card:hover .aksi-arrow {
        opacity: 1;
        transform: translateX(0);
    }
</style>
@endpush
@endsection