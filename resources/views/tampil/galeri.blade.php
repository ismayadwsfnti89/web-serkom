@extends('layouts.tampil')
@section('title', 'Galeri Sekolah')
@section('subtitle', 'Potret kegiatan seru di sekolah kami')

@section('content')
<div class="row g-3">
    @forelse($galeri as $item)
        <div class="col-6 col-md-4 col-lg-3">
            <x-galeri-card :item="$item" />
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada galeri.</div>
    @endforelse
</div>

@if($galeri->hasPages())
    <div class="mt-4">{{ $galeri->links('pagination::bootstrap-5') }}</div>
@endif
@endsection
