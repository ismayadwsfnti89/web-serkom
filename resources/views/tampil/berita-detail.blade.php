@extends('layouts.tampil')
@section('title', $berita->judul)
@section('subtitle', \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('d F Y'))

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if($berita->gambar)
            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" class="img-fluid rounded mb-4">
        @endif

        <h1 class="h3 fw-bold mb-3">{{ $berita->judul }}</h1>

        <div class="text-muted small mb-4">
            <i class="bi bi-calendar3 me-1"></i>
            {{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('d F Y') }}
        </div>

        <div style="line-height:1.8;">
            {!! nl2br(e($berita->isi)) !!}
        </div>

        <hr class="my-4">

        <a href="{{ route('tampil.berita') }}" class="btn btn-outline-danger">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke Berita
        </a>
    </div>
</div>
@endsection
