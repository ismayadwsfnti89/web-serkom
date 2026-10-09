@extends('layouts.tampil')
@section('title', 'Prestasi')
@section('subtitle', 'Kebanggaan sekolah kami')

@section('content')
<div class="row g-4">
    @forelse($prestasi as $item)
        @php
            $warna = match($item->tingkat) {
                'Internasional' => 'bg-primary',
                'Nasional'      => 'bg-danger',
                'Provinsi'      => 'bg-warning text-dark',
                default         => 'bg-secondary',
            };
        @endphp
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tampil.prestasi.detail', $item->id_prestasi) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    @if($item->foto)
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                    @else
                        <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 220px;">
                            <i class="bi bi-trophy text-secondary" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <span class="badge {{ $warna }} mb-2">{{ $item->tingkat }}</span>
                        <h5 class="fw-bold mb-2 text-dark">{{ $item->nama_prestasi }}</h5>
                        @if($item->juara)
                            <small class="text-danger d-block mb-1"><i class="bi bi-award-fill me-1"></i>{{ $item->juara }}</small>
                        @endif
                        @if($item->tahun)
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $item->tahun }}</small>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="bi bi-award fs-1 d-block mb-3"></i>
            <p>Belum ada data prestasi.</p>
        </div>
    @endforelse
</div>

@if($prestasi->hasPages())
    <div class="mt-4">{{ $prestasi->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
