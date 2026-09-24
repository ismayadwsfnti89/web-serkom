@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Detail Berita</h1>
            <p class="text-muted mb-0">Informasi lengkap berita</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('berita.edit', $berita->id_berita) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="dashboard-card">
        @if($berita->gambar)
            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                 alt="{{ $berita->judul }}"
                 class="img-fluid rounded mb-4"
                 style="max-height: 400px; width: 100%; object-fit: cover;">
        @endif

        <div class="d-flex gap-2 mb-3">
            @if($berita->status === 'Publish')
                <span class="badge bg-success">Publish</span>
            @else
                <span class="badge bg-warning text-dark">Draft</span>
            @endif
            <span class="badge bg-info">
                <i class="bi bi-calendar me-1"></i>
                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
            </span>
        </div>

        <h2 class="mb-3">{{ $berita->judul }}</h2>

        <div class="mb-4 text-muted small">
            <i class="bi bi-person me-1"></i>
            {{ $berita->user->nama ?? 'Unknown' }}
            <span class="mx-2">•</span>
            <i class="bi bi-clock me-1"></i>
            {{ $berita->created_at->format('d F Y, H:i') }}
        </div>

        <div class="berita-content" style="line-height: 1.8;">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </div>

</div>
@endsection