@extends('layouts.tampil')
@section('title', 'Galeri Sekolah')
@section('subtitle', 'Potret kegiatan seru di sekolah kami')

@section('content')
<div class="row g-3">
    @forelse($galeri as $item)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="ratio ratio-1x1">
                    @if($item->kategori === 'Foto')
                        <img src="{{ asset('uploads/galeri/' . $item->file) }}" class="object-fit-cover">
                    @else
                        <div class="bg-danger d-flex align-items-center justify-content-center">
                            <i class="bi bi-play-circle-fill text-white" style="font-size:3rem;"></i>
                        </div>
                    @endif
                </div>
                <div class="card-body p-2 text-center">
                    <small class="fw-semibold">{{ Str::limit($item->judul, 30) }}</small>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada galeri.</div>
    @endforelse
</div>

@if($galeri->hasPages())
    <div class="mt-4">{{ $galeri->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
