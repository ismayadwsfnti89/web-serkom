@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@php
    $jam = now()->hour;
    $sapaan = $jam < 11 ? 'Selamat pagi'
            : ($jam < 15 ? 'Selamat siang'
            : ($jam < 18 ? 'Selamat sore' : 'Selamat malam'));
@endphp

<div class="container-fluid p-0">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="h3 fw-semibold text-dark mb-1">
                Halo, {{ auth()->user()->nama }}
            </h1>
            <p class="text-muted small mb-0">
                {{ $sapaan }}, ini ringkasan data sekolah hari ini.
            </p>
        </div>
        <div class="text-end small text-muted">
            <div class="fw-medium text-dark">{{ now()->translatedFormat('l, d F Y') }}</div>
            <div>{{ now()->format('H:i') }} WIB</div>
        </div>
    </div>

    {{-- Alert profil --}}
    @if(!$profilLengkap)
        <div class="alert alert-warning d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span class="flex-grow-1 small">Profil sekolah belum lengkap. Isi dulu supaya data tampil maksimal.</span>
            <a href="{{ route('profil.edit') }}" class="small fw-medium text-decoration-underline">Isi sekarang</a>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="row g-3 mb-4">

        {{-- Card besar: Siswa --}}
        <div class="col-12 col-md-6">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-card-label">Total Siswa</div>
                        <div class="stats-card-value">{{ $totalSiswa }}</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 44px; height: 44px; background: #eff6ff; color: #2563eb;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div class="mt-3 small text-muted">
                    @if($siswaBaru > 0)
                        <span class="text-success fw-medium">+{{ $siswaBaru }}</span> siswa baru bulan ini
                    @else
                        Belum ada siswa baru bulan ini
                    @endif
                </div>
            </div>
        </div>

        {{-- Card Guru --}}
        <div class="col-12 col-md-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-card-label">Guru</div>
                        <div class="stats-card-value">{{ $totalGuru }}</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 40px; height: 40px; background: #ecfdf5; color: #059669;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Ekstrakurikuler --}}
        <div class="col-12 col-md-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-card-label">Ekstrakurikuler</div>
                        <div class="stats-card-value">{{ $totalEkskul }}</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 40px; height: 40px; background: #fffbeb; color: #d97706;">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Prestasi --}}
        <div class="col-12 col-md-3">
            <div class="stats-card h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-card-label">Prestasi</div>
                        <div class="stats-card-value">{{ $totalPrestasi }}</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center rounded-3"
                         style="width: 40px; height: 40px; background: #f5f3ff; color: #7c3aed;">
                        <i class="bi bi-award-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Info --}}
        <div class="col-12 col-md-3">
            <div class="h-100 p-4 rounded-3 text-white" style="background: #1f2937;">
                <div class="small" style="color: #9ca3af;">Info</div>
                <div class="small mt-2 lh-base">
                    Kelola data lewat menu di sidebar. Data otomatis tersimpan.
                </div>
            </div>
        </div>

    </div>

    {{-- Aksi cepat --}}
    <div>
        <h2 class="small fw-semibold text-dark mb-3">Aksi Cepat</h2>
        <div class="row g-3">
            @foreach([
                ['label' => 'Tambah Siswa',    'desc' => 'Input data siswa baru',  'route' => 'siswa.index',    'icon' => 'bi-people',       'bg' => '#eff6ff', 'fg' => '#2563eb'],
                ['label' => 'Tambah Guru',     'desc' => 'Input data guru baru',   'route' => 'guru.index',     'icon' => 'bi-person-badge', 'bg' => '#ecfdf5', 'fg' => '#059669'],
                ['label' => 'Tambah Ekskul',   'desc' => 'Daftarkan ekskul baru',  'route' => 'ekskul.index',   'icon' => 'bi-trophy',       'bg' => '#fffbeb', 'fg' => '#d97706'],
                ['label' => 'Tambah Prestasi', 'desc' => 'Catat prestasi siswa',   'route' => 'prestasi.index', 'icon' => 'bi-award',        'bg' => '#f5f3ff', 'fg' => '#7c3aed'],
            ] as $aksi)
                <div class="col-6 col-md-3">
                    <a href="{{ route($aksi['route']) }}"
                       class="d-block text-decoration-none bg-white border rounded-3 p-3 h-100 aksi-card">
                        <div class="d-flex align-items-center justify-content-center rounded-2 mb-3"
                             style="width: 32px; height: 32px; background: {{ $aksi['bg'] }}; color: {{ $aksi['fg'] }};">
                            <i class="bi {{ $aksi['icon'] }}"></i>
                        </div>
                        <div class="small fw-medium text-dark">{{ $aksi['label'] }}</div>
                        <div class="text-muted" style="font-size: 0.75rem;">{{ $aksi['desc'] }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>

@push('styles')
<style>
    .aksi-card {
        transition: all 0.15s ease;
    }
    .aksi-card:hover {
        border-color: #cbd5e1 !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    }
</style>
@endpush
@endsection