@extends('layouts.app')

@section('title', 'Daftar Pengumuman')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Daftar Pengumuman</h1>
            <p class="text-muted mb-0">Kelola pengumuman sekolah</p>
        </div>
        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Penulis</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengumuman as $index => $item)
                    <tr>
                        <td>{{ $pengumuman->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ Str::limit($item->judul, 70) }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
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
                            <a href="{{ route('pengumuman.show', $item->id_pengumuman) }}"
                               class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('pengumuman.edit', $item->id_pengumuman) }}"
                               class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-megaphone fs-1 d-block mb-2"></i>
                            Belum ada data pengumuman
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $pengumuman->links() }}
        </div>
    </div>

</div>
@endsection