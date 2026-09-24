@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Dashboard Overview</h1>
        <p class="text-muted">Selamat datang di Web Sekolah!</p>
    </div>

    {{-- Profil Sekolah Card --}}
    @php
        $profil = \App\Models\ProfileSekolah::first();
    @endphp

    @if($profil)
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="d-flex align-items-center gap-4">
                    @if($profil->logo)
                        <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                             alt="Logo Sekolah"
                             style="width: 80px; height: 80px; object-fit: contain;">
                    @else
                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                             style="width: 80px; height: 80px;">
                            <i class="bi bi-mortarboard-fill text-primary" style="font-size: 2rem;"></i>
                        </div>
                    @endif

                    <div class="flex-grow-1">
                        <h4 class="mb-1">{{ $profil->nama_sekolah ?? 'Web Sekolah' }}</h4>
                        <p class="text-muted mb-1 small">
                            <i class="bi bi-geo-alt me-1"></i>
                            {{ $profil->alamat ?? 'Alamat belum diisi' }}
                        </p>
                        <p class="text-muted mb-0 small">
                            <i class="bi bi-person-badge me-1"></i>
                            Kepala Sekolah: {{ $profil->kepala_sekolah ?? '-' }}
                            <span class="mx-2">•</span>
                            <i class="bi bi-telephone me-1"></i>
                            {{ $profil->kontak ?? '-' }}
                            @if($profil->npsn)
                                <span class="mx-2">•</span>
                                <i class="bi bi-hash me-1"></i>
                                NPSN: {{ $profil->npsn }}
                            @endif
                        </p>
                    </div>

                    <a href="{{ route('profil.edit') }}" class="btn btn-outline-primary">
                        <i class="bi bi-pencil me-2"></i>Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="alert alert-warning d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Profil sekolah belum diisi.</strong>
                    Silakan isi data profil sekolah terlebih dahulu.
                </div>
                <a href="{{ route('profil.edit') }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-plus-circle me-1"></i>Isi Profil
                </a>
            </div>
        </div>
    </div>
    @endif

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                         style="width: 56px; height: 56px;">
                        <i class="bi bi-people text-primary fs-4"></i>
                    </div>
                    <div>
                        <div class="stats-card-label">Total Siswa</div>
                        <div class="stats-card-value">{{ \App\Models\Siswa::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                         style="width: 56px; height: 56px;">
                        <i class="bi bi-person-badge text-success fs-4"></i>
                    </div>
                    <div>
                        <div class="stats-card-label">Total Guru</div>
                        <div class="stats-card-value">{{ \App\Models\Guru::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                         style="width: 56px; height: 56px;">
                        <i class="bi bi-trophy text-warning fs-4"></i>
                    </div>
                    <div>
                        <div class="stats-card-label">Ekstrakurikuler</div>
                        <div class="stats-card-value">{{ \App\Models\Ekstrakurikuler::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                         style="width: 56px; height: 56px;">
                        <i class="bi bi-award text-info fs-4"></i>
                    </div>
                    <div>
                        <div class="stats-card-label">Prestasi</div>
                        <div class="stats-card-value">{{ \App\Models\Prestasi::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="dashboard-card">
                <h5 class="mb-3">
                    <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                    Aksi Cepat
                </h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('siswa.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-person-plus me-2"></i>Kelola Siswa
                    </a>
                    <a href="{{ route('guru.index') }}" class="btn btn-outline-success">
                        <i class="bi bi-person-badge me-2"></i>Kelola Guru
                    </a>
                    <a href="{{ route('ekskul.index') }}" class="btn btn-outline-warning">
                        <i class="bi bi-trophy me-2"></i>Kelola Ekstrakurikuler
                    </a>
                    <a href="{{ route('prestasi.index') }}" class="btn btn-outline-info">
                        <i class="bi bi-award me-2"></i>Kelola Prestasi
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="dashboard-card">
                <h5 class="mb-3">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>
                    Informasi
                </h5>
                <div class="alert alert-info mb-0">
                    <strong>Selamat Datang!</strong><br>
                    Ini adalah dashboard admin Web Sekolah. Gunakan menu di sidebar untuk mengelola data siswa, guru, ekstrakurikuler, dan prestasi.
                </div>
            </div>
        </div>
    </div>

</div>
@endsection