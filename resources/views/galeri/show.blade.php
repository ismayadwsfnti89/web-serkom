@extends('layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Detail Galeri</h1>
            <p class="text-muted mb-0">{{ $galeri->judul }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('galeri.edit', encrypt_id($galeri->id_galeri)) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="row">
            <div class="col-md-8 text-center">
                @if($galeri->kategori === 'Foto')
                    <img src="{{ asset('uploads/galeri/' . $galeri->file) }}"
                         alt="{{ $galeri->judul }}"
                         class="img-fluid rounded"
                         style="max-height: 500px;">
                @else
                    <video controls class="img-fluid rounded" style="max-height: 500px;">
                        <source src="{{ asset('uploads/galeri/' . $galeri->file) }}">
                        Browser Anda tidak mendukung tag video.
                    </video>
                @endif
            </div>
            <div class="col-md-4">
                <h4 class="mb-3">{{ $galeri->judul }}</h4>
                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" width="120">Judul</td>
                        <td><strong>{{ $galeri->judul }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Kategori</td>
                        <td>
                            @if($galeri->kategori === 'Foto')
                                <span class="badge bg-primary">Foto</span>
                            @else
                                <span class="badge bg-danger">Video</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Tanggal</td>
                        <td>{{ $galeri->tanggal ? \Carbon\Carbon::parse($galeri->tanggal)->format('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Diunggah</td>
                        <td>{{ $galeri->created_at->format('d F Y') }}</td>
                    </tr>
                </table>

                @if($galeri->keterangan)
                    <h6 class="mt-3 mb-2">Keterangan</h6>
                    <p class="text-muted">{{ $galeri->keterangan }}</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection