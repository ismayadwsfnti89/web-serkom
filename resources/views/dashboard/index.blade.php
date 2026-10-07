@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@php
    $jam = now()->hour;
    $sapaan = $jam < 11 ? 'Selamat pagi'
            : ($jam < 15 ? 'Selamat siang'
            : ($jam < 18 ? 'Selamat sore' : 'Selamat malam'));

    $namaLengkap = auth()->user()->nama ?? 'Admin';
    $namaPanggil = explode(' ', trim($namaLengkap))[0];
@endphp

<div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">{{ $sapaan }}, {{ $namaPanggil }}</h1>
        <p class="text-muted small mb-0">Ini ringkasan data sekolah hari ini.</p>
    </div>
    <div class="text-end">
        <span class="badge bg-danger">
            <i class="bi bi-calendar3 me-1"></i>
            {{ now()->locale('id')->translatedFormat('l, d F Y') }}
        </span>
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-6 col-lg-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stats-card-label">Total Siswa</div>
                <i class="bi bi-people-fill text-danger fs-4"></i>
            </div>
            <div class="stats-card-value">{{ $totalSiswa }}</div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stats-card-label">Guru</div>
                <i class="bi bi-person-badge-fill text-danger fs-4"></i>
            </div>
            <div class="stats-card-value">{{ $totalGuru }}</div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stats-card-label">Ekstrakurikuler</div>
                <i class="bi bi-trophy-fill text-danger fs-4"></i>
            </div>
            <div class="stats-card-value">{{ $totalEkskul }}</div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stats-card-label">Prestasi</div>
                <i class="bi bi-award-fill text-danger fs-4"></i>
            </div>
            <div class="stats-card-value">{{ $totalPrestasi }}</div>
        </div>
    </div>
</div>

<div class="mb-2">
    <h2 class="h6 fw-bold mb-3">
        <i class="bi bi-lightning-charge-fill text-danger me-1"></i>
        Aksi Cepat
    </h2>

    <div class="row g-3">
        <div class="col-6 col-md-3">
            <a href="{{ route('siswa.index') }}" class="card border text-decoration-none h-100">
                <div class="card-body">
                    <i class="bi bi-people text-danger fs-3"></i>
                    <div class="small fw-semibold mt-2">Tambah Siswa</div>
                    <div class="text-muted small">Input data siswa baru</div>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="{{ route('guru.index') }}" class="card border text-decoration-none h-100">
                <div class="card-body">
                    <i class="bi bi-person-badge text-danger fs-3"></i>
                    <div class="small fw-semibold mt-2">Tambah Guru</div>
                    <div class="text-muted small">Input data guru baru</div>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="{{ route('ekskul.index') }}" class="card border text-decoration-none h-100">
                <div class="card-body">
                    <i class="bi bi-trophy text-danger fs-3"></i>
                    <div class="small fw-semibold mt-2">Tambah Ekskul</div>
                    <div class="text-muted small">Daftarkan ekskul baru</div>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="{{ route('prestasi.index') }}" class="card border text-decoration-none h-100">
                <div class="card-body">
                    <i class="bi bi-award text-danger fs-3"></i>
                    <div class="small fw-semibold mt-2">Tambah Prestasi</div>
                    <div class="text-muted small">Catat prestasi siswa</div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
