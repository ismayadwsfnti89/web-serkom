@extends('layouts.app')

@section('title', 'Detail Prestasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Detail Prestasi</h1>
        <p class="text-muted mb-0">Informasi lengkap prestasi</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('prestasi.edit', encrypt_id($prestasi->id_prestasi)) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit
        </a>
        <a href="{{ route('prestasi.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="dashboard-card">
    <div class="row">
        <div class="col-md-4 text-center">
            @if($prestasi->foto)
                <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                     alt="{{ $prestasi->nama_prestasi }}"
                     class="img-fluid rounded mb-3"
                     style="max-height: 300px; object-fit: cover;">
            @else
                <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3"
                     style="height: 300px;">
                    <i class="bi bi-trophy text-muted" style="font-size: 4rem;"></i>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <h3 class="mb-3">{{ $prestasi->nama_prestasi }}</h3>
            <table class="table table-borderless">
                <tr>
                    <td class="text-muted" width="200">Nama Prestasi</td>
                    <td><strong>{{ $prestasi->nama_prestasi }}</strong></td>
                </tr>
                <tr>
                    <td class="text-muted">Tingkat</td>
                    <td>
                        @if($prestasi->tingkat === 'Nasional')
                            <span class="badge bg-danger">{{ $prestasi->tingkat }}</span>
                        @elseif($prestasi->tingkat === 'Provinsi')
                            <span class="badge bg-warning text-dark">{{ $prestasi->tingkat }}</span>
                        @elseif($prestasi->tingkat === 'Kabupaten')
                            <span class="badge bg-info">{{ $prestasi->tingkat }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $prestasi->tingkat }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="text-muted">Juara</td>
                    <td>{{ $prestasi->juara ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Tahun</td>
                    <td>{{ $prestasi->tahun ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Terdaftar Sejak</td>
                    <td>{{ $prestasi->created_at->format('d F Y') }}</td>
                </tr>
            </table>

            @if($prestasi->deskripsi)
                <h6 class="mt-4 mb-2">Deskripsi</h6>
                <p class="text-muted">{{ $prestasi->deskripsi }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
