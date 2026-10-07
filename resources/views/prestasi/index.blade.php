@extends('layouts.app')

@section('title', 'Daftar Prestasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Daftar Prestasi</h1>
        <p class="text-muted mb-0">Kelola data prestasi sekolah</p>
    </div>
    <a href="{{ route('prestasi.create') }}" class="btn btn-danger">
        <i class="bi bi-plus-circle me-2"></i>Tambah Prestasi
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<x-search-bar
    :action="route('prestasi.index')"
    placeholder="Cari nama prestasi, tingkat, atau juara..."
    :value="request('search')"
/>

<div class="dashboard-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="50">No</th>
                    <th width="100">Foto</th>
                    <th>Nama Prestasi</th>
                    <th>Tingkat</th>
                    <th>Juara</th>
                    <th>Tahun</th>
                    <th width="180" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasi as $index => $item)
                <tr>
                    <td>{{ $prestasi->firstItem() + $index }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('uploads/prestasi/' . $item->foto) }}"
                                 alt="{{ $item->nama_prestasi }}"
                                 class="rounded"
                                 width="60" height="60"
                                 style="object-fit: cover;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="bi bi-trophy text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $item->nama_prestasi }}</td>
                    <td>
                        @if($item->tingkat === 'Nasional')
                            <span class="badge bg-danger">{{ $item->tingkat }}</span>
                        @elseif($item->tingkat === 'Provinsi')
                            <span class="badge bg-warning text-dark">{{ $item->tingkat }}</span>
                        @elseif($item->tingkat === 'Kabupaten')
                            <span class="badge bg-info">{{ $item->tingkat }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $item->tingkat }}</span>
                        @endif
                    </td>
                    <td>{{ $item->juara ?? '-' }}</td>
                    <td>{{ $item->tahun ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('prestasi.show', encrypt_id($item->id_prestasi)) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('prestasi.edit', encrypt_id($item->id_prestasi)) }}"
                           class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('prestasi.destroy', encrypt_id($item->id_prestasi)) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus prestasi ini?')">
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
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                        <p class="mb-0">Belum ada data prestasi.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($prestasi->hasPages())
        <div class="mt-3">{{ $prestasi->links() }}</div>
    @endif
</div>
@endsection
