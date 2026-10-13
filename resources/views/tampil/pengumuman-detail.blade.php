@extends('layouts.tampil')
@section('title', $pengumuman->judul)
@section('subtitle', 'Pengumuman')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="d-flex gap-2 mb-3 flex-wrap">
            <span class="badge bg-danger">
                <i class="bi bi-calendar3 me-1"></i>
                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->locale('id')->translatedFormat('d F Y') }}
            </span>
        </div>

        <h1 class="h3 fw-bold mb-3">{{ $pengumuman->judul }}</h1>

        <div class="text-muted small mb-4">
            <i class="bi bi-person me-1"></i>
            {{ $pengumuman->user->nama ?? 'Admin' }}
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div style="line-height: 1.8;">
                    {!! nl2br(e($pengumuman->isi)) !!}
                </div>
            </div>
        </div>

        <hr class="my-4">

        <a href="{{ route('tampil.pengumuman') }}" class="btn btn-outline-danger">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke Pengumuman
        </a>
    </div>
</div>
@endsection
