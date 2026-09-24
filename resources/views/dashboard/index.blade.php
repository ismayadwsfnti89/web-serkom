@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Dashboard Overview</h1>
        <p class="text-muted">Selamat datang di Web Sekolah!</p>
    </div>

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
