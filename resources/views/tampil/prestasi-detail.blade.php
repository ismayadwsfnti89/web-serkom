@extends('layouts.tampil')
@section('title', $prestasi->nama_prestasi)
@section('subtitle', $prestasi->tingkat)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if($prestasi->foto)
            <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}" class="img-fluid rounded mb-4">
        @endif

        <h3 class="fw-bold mb-3">{{ $prestasi->nama_prestasi }}</h3>

        <div class="d-flex gap-2 mb-3 flex-wrap">
            <span class="badge bg-primary">{{ $prestasi->tingkat }}</span>
            @if($prestasi->juara)
                <span class="badge bg-danger">{{ $prestasi->juara }}</span>
            @endif
            @if($prestasi->tahun)
                <span class="badge bg-light text-dark">{{ $prestasi->tahun }}</span>
            @endif
        </div>

        @if($prestasi->deskripsi)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Deskripsi</h6>
                    <p class="mb-0" style="line-height: 1.8;">{{ $prestasi->deskripsi }}</p>
                </div>
            </div>
        @endif

        <hr class="my-4">

        <a href="{{ route('tampil.prestasi') }}" class="btn btn-outline-danger">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </div>
</div>
@endsection
