@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Detail Guru</h1>
        <p class="text-muted mb-0">Informasi lengkap guru</p>
    </div>
    <div class="d-flex gap-2">
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('guru.edit', encrypt_id($guru->id_guru)) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
        @endif
        <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="dashboard-card">
    <div class="row align-items-center">
        <div class="col-md-3 text-center">
            @if($guru->foto)
                <img src="{{ asset('uploads/guru/' . $guru->foto) }}"
                     alt="{{ $guru->nama_guru }}"
                     class="rounded-circle mb-3"
                     width="150" height="150"
                     style="object-fit: cover;">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($guru->nama_guru) }}&background=dc3545&color=fff&size=150"
                     alt="{{ $guru->nama_guru }}"
                     class="rounded-circle mb-3"
                     width="150" height="150">
            @endif
            <h4 class="mb-1">{{ $guru->nama_guru }}</h4>
            <p class="text-muted mb-2">{{ $guru->jabatan ?? 'Guru' }}</p>
        </div>
        <div class="col-md-9">
            <h5 class="mb-3">Informasi Guru</h5>
            <table class="table table-borderless">
                <tr>
                    <td class="text-muted" width="200">Nama Guru</td>
                    <td><strong>{{ $guru->nama_guru }}</strong></td>
                </tr>
                <tr>
                    <td class="text-muted">NIP</td>
                    <td>{{ $guru->nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Jabatan</td>
                    <td>{{ $guru->jabatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Mata Pelajaran</td>
                    <td>{{ $guru->mapel ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Terdaftar Sejak</td>
                    <td>{{ $guru->created_at->locale('id')->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
