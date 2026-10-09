{{-- Halaman detail ekstrakurikuler (publik) --}}
@extends('layouts.tampil')
@section('title', $ekskul->nama_ekskul)
@section('subtitle', 'Ekstrakurikuler')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if($ekskul->gambar)
            <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}"
                 alt="{{ $ekskul->nama_ekskul }}"
                 class="img-fluid rounded mb-4">
        @endif

        <h3 class="fw-bold mb-3">{{ $ekskul->nama_ekskul }}</h3>

        <table class="table table-borderless">
            @if($ekskul->pembina)
                <tr>
                    <td width="120" class="text-muted">Pembina</td>
                    <td><strong>{{ $ekskul->pembina }}</strong></td>
                </tr>
            @endif
            @if($ekskul->jadwal_latihan)
                <tr>
                    <td class="text-muted">Jadwal</td>
                    <td><strong>{{ $ekskul->jadwal_latihan }}</strong></td>
                </tr>
            @endif
        </table>

        @if($ekskul->deskripsi)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Deskripsi</h6>
                    <p class="mb-0" style="line-height: 1.8;">{{ $ekskul->deskripsi }}</p>
                </div>
            </div>
        @endif

        <hr class="my-4">

        <a href="{{ route('tampil.ekskul') }}" class="btn btn-outline-danger">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </div>
</div>
@endsection
