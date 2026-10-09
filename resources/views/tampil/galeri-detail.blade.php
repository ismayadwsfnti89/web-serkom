@extends('layouts.tampil')
@section('title', $galeri->judul)
@section('subtitle', $galeri->kategori)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        {{-- Preview: foto atau video --}}
        <div class="mb-4 text-center">
            @if($galeri->kategori === 'Foto')
                <img src="{{ $galeri->thumbnail }}"
                     alt="{{ $galeri->judul }}"
                     class="img-fluid rounded shadow-sm"
                     style="max-height: 600px;">
            @elseif($galeri->video_id)
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $galeri->video_id }}"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            @else
                <div class="alert alert-warning">Link video tidak valid.</div>
            @endif
        </div>

        {{-- Info --}}
        <h3 class="fw-bold mb-3">{{ $galeri->judul }}</h3>

        <div class="d-flex gap-2 mb-3 flex-wrap">
            <span class="badge {{ $galeri->kategori === 'Foto' ? 'bg-success' : 'bg-danger' }}">
                {{ $galeri->kategori }}
            </span>
            @if($galeri->tanggal)
                <span class="badge bg-light text-dark">
                    {{ \Carbon\Carbon::parse($galeri->tanggal)->locale('id')->translatedFormat('d F Y') }}
                </span>
            @endif
        </div>

        @if($galeri->keterangan)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <p class="mb-0" style="line-height: 1.8;">{{ $galeri->keterangan }}</p>
                </div>
            </div>
        @endif

        <hr class="my-4">

        <a href="{{ route('tampil.galeri') }}" class="btn btn-outline-danger">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </div>
</div>
@endsection
