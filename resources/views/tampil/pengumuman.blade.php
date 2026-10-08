@extends('layouts.tampil')
@section('title', 'Pengumuman')
@section('subtitle', 'Informasi penting dari sekolah')

@section('content')
<div class="row g-3">
    @forelse($pengumuman as $item)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex gap-3">
                    <div class="bg-danger text-white rounded-3 text-center p-2" style="min-width:60px;">
                        <div class="fw-bold fs-4">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</div>
                        <small style="font-size:0.7rem;">
                            {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('M Y') }}
                        </small>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">{{ $item->judul }}</h6>
                        <p class="text-muted small mb-0">{{ Str::limit(strip_tags($item->isi), 120) }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada pengumuman.</div>
    @endforelse
</div>

@if($pengumuman->hasPages())
    <div class="mt-4">{{ $pengumuman->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
