@extends('layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Detail Pengumuman</h1>
        <p class="text-muted mb-0">Informasi lengkap pengumuman</p>
    </div>
    <div class="d-flex gap-2">
        @if(in_array(Auth::user()->role, ['admin', 'operator']))
            <a href="{{ route('pengumuman.edit', encrypt_id($pengumuman->id_pengumuman)) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
        @endif
        <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="dashboard-card">
    <div class="d-flex gap-2 mb-3 flex-wrap">
        @if($pengumuman->status === 'Publish')
            <span class="badge bg-success">Publish</span>
        @else
            <span class="badge bg-warning text-dark">Draft</span>
        @endif
        <span class="badge bg-info">
            <i class="bi bi-calendar me-1"></i>
            {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F Y') }}
        </span>
    </div>

    <h2 class="mb-3">{{ $pengumuman->judul }}</h2>

    <div class="mb-4 text-muted small">
        <i class="bi bi-person me-1"></i>
        {{ $pengumuman->user->nama ?? 'Unknown' }}
        <span class="mx-2">•</span>
        <i class="bi bi-clock me-1"></i>
        {{ $pengumuman->created_at->format('d F Y, H:i') }}
    </div>

    <div style="line-height: 1.8;">
        {!! nl2br(e($pengumuman->isi)) !!}
    </div>
</div>
@endsection
