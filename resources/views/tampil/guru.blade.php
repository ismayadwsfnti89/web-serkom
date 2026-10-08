@extends('layouts.tampil')
@section('title', 'Guru & Staf')
@section('subtitle', 'Tenaga pendidik profesional kami')

@section('content')
<div class="row g-4">
    @forelse($guru as $item)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="ratio ratio-1x1">
                    @if($item->foto)
                        <img src="{{ asset('uploads/guru/' . $item->foto) }}" class="object-fit-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_guru) }}&background=dc3545&color=fff&size=200">
                    @endif
                </div>
                <div class="card-body p-3">
                    <h6 class="fw-bold mb-1">{{ $item->nama_guru }}</h6>
                    <small class="text-muted d-block">{{ $item->jabatan ?? 'Guru' }}</small>
                    @if($item->mapel)
                        <span class="badge bg-warning text-dark mt-2">{{ $item->mapel }}</span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada data guru.</div>
    @endforelse
</div>

@if($guru->hasPages())
    <div class="mt-4">{{ $guru->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
