@extends('layouts.tampil')
@section('title', 'Ekstrakurikuler')
@section('subtitle', 'Wadah pengembangan bakat & minat siswa')

@section('content')
<div class="row g-4">
    @forelse($ekskul as $item)
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                @if($item->gambar)
                    <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}" class="card-img-top" style="height:180px;object-fit:cover;">
                @else
                    <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height:180px;">
                        <i class="bi bi-trophy text-secondary" style="font-size:3rem;"></i>
                    </div>
                @endif
                <div class="card-body text-center">
                    <h6 class="fw-bold mb-2">{{ $item->nama_ekskul }}</h6>
                    @if($item->pembina)<small class="text-muted d-block">{{ $item->pembina }}</small>@endif
                    @if($item->jadwal_latihan)<small class="text-muted d-block">{{ $item->jadwal_latihan }}</small>@endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada ekstrakurikuler.</div>
    @endforelse
</div>

@if($ekskul->hasPages())
    <div class="mt-4">{{ $ekskul->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
