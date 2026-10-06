@extends('layouts.app')

@section('title', 'Detail Ekstrakurikuler')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Detail Ekstrakurikuler</h1>
            <p class="text-muted mb-0">Informasi lengkap ekstrakurikuler</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('ekskul.edit', encrypt_id($ekskul->id_ekskul)) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('ekskul.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($ekskul->gambar)
                    <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}"
                         alt="{{ $ekskul->nama_ekskul }}"
                         class="img-fluid rounded mb-3"
                         style="max-height: 300px; object-fit: cover;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3"
                         style="height: 300px;">
                        <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h3 class="mb-3">{{ $ekskul->nama_ekskul }}</h3>
                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" width="200">Nama Ekstrakurikuler</td>
                        <td><strong>{{ $ekskul->nama_ekskul }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Pembina</td>
                        <td>{{ $ekskul->pembina ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Jadwal Latihan</td>
                        <td>{{ $ekskul->jadwal_latihan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Terdaftar Sejak</td>
                        <td>{{ $ekskul->created_at->format('d F Y') }}</td>
                    </tr>
                </table>

                @if($ekskul->deskripsi)
                    <h6 class="mt-4 mb-2">Deskripsi</h6>
                    <p class="text-muted">{{ $ekskul->deskripsi }}</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection