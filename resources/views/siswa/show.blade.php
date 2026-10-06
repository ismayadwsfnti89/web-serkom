@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Detail Siswa</h1>
            <p class="text-muted mb-0">Informasi lengkap siswa</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('siswa.edit', encrypt_id($siswa->id_siswa)) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    {{-- Profile Card --}}
    <div class="dashboard-card">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($siswa->nama_siswa) }}&background=b91c1c&color=fff&size=150"
                    alt="{{ $siswa->nama_siswa }}"
                    class="rounded-circle mb-3"
                    width="150"
                    height="150">
                <h4 class="mb-1">{{ $siswa->nama_siswa }}</h4>
                <p class="text-muted mb-2">NISN: {{ $siswa->nisn }}</p>
                @if($siswa->jenis_kelamin === 'Laki-Laki')
                    <span class="badge bg-primary">Laki-Laki</span>
                @else
                    <span class="badge bg-danger">Perempuan</span>
                @endif
            </div>
            <div class="col-md-9">
                <h5 class="mb-3">Informasi Siswa</h5>
                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" width="200">NISN</td>
                        <td><strong>{{ $siswa->nisn }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Nama Siswa</td>
                        <td><strong>{{ $siswa->nama_siswa }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Jenis Kelamin</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Tahun Masuk</td>
                        <td>{{ $siswa->tahun_masuk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Terdaftar Sejak</td>
                        <td>{{ $siswa->created_at->format('d F Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
