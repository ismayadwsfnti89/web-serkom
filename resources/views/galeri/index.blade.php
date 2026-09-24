@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Galeri</h1>
            <p class="text-muted mb-0">Kelola foto &amp; video galeri sekolah</p>
        </div>
        <a href="{{ route('galeri.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Galeri
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Grid Galeri --}}
    <div class="row g-3">
        @forelse($galeri as $item)
        <div class="col-md-4 col-lg-3">
            <div class="dashboard-card h-100">
                {{-- Preview File --}}
                @if($item->kategori === 'Foto')
                    <img src="{{ asset('uploads/galeri/' . $item->file) }}"
                         alt="{{ $item->judul }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
                @else
                    <div class="bg-dark d-flex align-items-center justify-content-center"
                         style="height: 200px; border-radius: 12px 12px 0 0;">
                        <i class="bi bi-play-circle text-white" style="font-size: 4rem;"></i>
                    </div>
                @endif

                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="mb-0 fw-semibold">{{ $item->judul }}</h6>
                        @if($item->kategori === 'Foto')
                            <span class="badge bg-primary">Foto</span>
                        @else
                            <span class="badge bg-danger">Video</span>
                        @endif
                    </div>
                    <p class="text-muted small mb-2">
                        <i class="bi bi-calendar me-1"></i>
                        {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                    </p>
                    @if($item->keterangan)
                        <p class="text-muted small mb-3">
                            {{ \Illuminate\Support\Str::limit($item->keterangan, 60) }}
                        </p>
                    @endif

                    <div class="d-flex gap-1">
                        <a href="{{ route('galeri.show', $item->id_galeri) }}"
                           class="btn btn-sm btn-outline-info flex-fill" title="Lihat">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('galeri.edit', $item->id_galeri) }}"
                           class="btn btn-sm btn-outline-warning flex-fill" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('galeri.destroy', $item->id_galeri) }}"
                              method="POST" class="flex-fill"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="dashboard-card text-center py-5">
                <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3">Belum ada data galeri</h5>
                <p class="text-muted">Mulai tambahkan foto atau video</p>
                <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Galeri
                </a>
            </div>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $galeri->links() }}
    </div>

</div>
@endsection