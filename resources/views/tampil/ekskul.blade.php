@extends('layouts.tampil')
@section('title', 'Ekstrakurikuler')
@section('subtitle', 'Wadah pengembangan bakat & minat siswa')

@section('content')
<div class="row g-4">
    @forelse($ekskul as $item)
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tampil.ekskul.detail', $item->id_ekskul) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    @if($item->gambar)
                        <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-trophy text-secondary" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="fw-bold mb-2 text-dark">{{ $item->nama_ekskul }}</h5>
                        @if($item->pembina)
                            <small class="text-muted d-block mb-1"><i class="bi bi-person-fill me-1"></i>{{ $item->pembina }}</small>
                        @endif
                        @if($item->jadwal_latihan)
                            <small class="text-muted d-block"><i class="bi bi-clock-fill me-1"></i>{{ $item->jadwal_latihan }}</small>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada data ekstrakurikuler.</div>
    @endforelse
</div>

@if($ekskul->hasPages())
    <div class="mt-4">{{ $ekskul->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
