@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Daftar Berita</h1>
            <p class="text-muted mb-0">Kelola berita sekolah</p>
        </div>
        <a href="{{ route('berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <x-search-bar
        :action="route('berita.index')"
        placeholder="Cari judul atau isi berita..."
        :value="request('search')"
    />

    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="100">Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Penulis</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($berita as $index => $item)
                    <tr>
                        <td>{{ $berita->firstItem() + $index }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}"
                                     alt="{{ $item->judul }}"
                                     class="rounded"
                                     width="60" height="60"
                                     style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="width: 60px; height: 60px;">
                                    <i class="bi bi-newspaper text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ Str::limit($item->judul, 60) }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}</td>
                        <td>
                            @if($item->status === 'Publish')
                                <span class="badge bg-success">Publish</span>
                            @else
                                <span class="badge bg-warning text-dark">Draft</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $item->user->nama ?? '-' }}</small>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('berita.show', encrypt_id($item->id_berita)) }}"
                            class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('berita.edit', encrypt_id($item->id_berita)) }}"
                            class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('berita.destroy', encrypt_id($item->id_berita)) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus berita &quot;{{ Str::limit($item->judul, 40) }}&quot;? Data yang dihapus tidak bisa dikembalikan.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            @if(request('search'))
                                <i class="bi bi-search fs-1 d-block mb-3 opacity-50"></i>
                                <p class="mb-1 fw-medium">Tidak ada berita yang cocok</p>
                                <p class="small mb-0">Coba kata kunci lain atau reset pencarian.</p>
                            @else
                                <i class="bi bi-newspaper fs-1 d-block mb-3 opacity-50"></i>
                                <p class="mb-1 fw-medium">Belum ada data berita</p>
                                <p class="small mb-0">Mulai tulis berita pertama.</p>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($berita->hasPages())
            <div class="mt-3">
                {{ $berita->links() }}
            </div>
        @endif
    </div>

</div>
@endsection