@extends('layouts.tampil')
@section('title', 'Berita')
@section('subtitle', 'Kegiatan & kabar terbaru dari sekolah')

@section('content')
<div class="row g-4">
    @forelse($berita as $item)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                @if($item->gambar)
                    <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @else
                    <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height:200px;">
                        <i class="bi bi-newspaper text-secondary" style="font-size:3rem;"></i>
                    </div>
                @endif
                <div class="card-body">
                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}
                    </small>
                    <h6 class="fw-bold mt-2">{{ $item->judul }}</h6>
                    <p class="text-muted small">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                    <a href="{{ route('tampil.berita.detail', $item->id_berita) }}" class="text-danger small text-decoration-none">
                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada berita.</div>
    @endforelse
</div>

@if($berita->hasPages())
    <div class="mt-4">{{ $berita->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
