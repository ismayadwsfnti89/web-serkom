@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">Galeri</h1>
        <p class="text-muted mb-0">Kelola foto & video galeri sekolah</p>
    </div>

    <div class="d-flex align-items-center gap-2">
        <x-search-bar
            :action="route('galeri.index')"
            placeholder="Cari galeri..."
            :value="request('search')"
        />

        <a href="{{ route('galeri.create') }}" class="btn btn-danger text-nowrap">
            <i class="bi bi-plus-circle me-1"></i>Tambah
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="dashboard-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="50">No</th>
                    <th width="100">File</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th width="180" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeri as $index => $item)
                <tr>
                    <td>{{ $galeri->firstItem() + $index }}</td>
                    <td>
                        @if($item->kategori === 'Foto')
                            <img src="{{ asset('uploads/galeri/' . $item->file) }}"
                                 alt="{{ $item->judul }}"
                                 class="rounded"
                                 width="60" height="60"
                                 style="object-fit: cover;">
                        @else
                            <div class="bg-dark rounded d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="bi bi-play-circle text-white"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $item->judul }}</td>
                    <td>
                        @if($item->kategori === 'Foto')
                            <span class="badge bg-primary">Foto</span>
                        @else
                            <span class="badge bg-danger">Video</span>
                        @endif
                    </td>
                    <td>
                        {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') : '-' }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('galeri.show', encrypt_id($item->id_galeri)) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('galeri.edit', encrypt_id($item->id_galeri)) }}"
                           class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('galeri.destroy', encrypt_id($item->id_galeri)) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus galeri ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-images fs-1 d-block mb-3"></i>
                        <p class="mb-0">Belum ada data galeri.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($galeri->hasPages())
        <div class="mt-3">{{ $galeri->links('pagination::bootstrap-5') }}</div>
    @endif
</div>
@endsection
