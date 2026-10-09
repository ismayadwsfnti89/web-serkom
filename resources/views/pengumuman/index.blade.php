@extends('layouts.app')

@section('title', 'Daftar Pengumuman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Daftar Pengumuman</h1>
        <p class="text-muted mb-0">Kelola pengumuman sekolah</p>
    </div>
    <div class="d-flex align-items-center gap-3">
        <x-search-bar
            :action="route('pengumuman.index')"
            placeholder="Cari ..."
            :value="request('search')"/>

        @if(in_array(Auth::user()->role, ['admin', 'operator']))
            <a href="{{ route('pengumuman.create') }}" class="btn btn-danger">
                <i class="bi bi-plus-circle me-2"></i>Tambah Pengumuman
            </a>
        @endif
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
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}</td>
                    <td>
                        @if($item->status === 'Publish')
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-warning text-dark">Draft</span>
                        @endif
                    </td>
                    <td><small class="text-muted">{{ $item->user->nama ?? '-' }}</small></td>
                    <td class="text-center">
                        {{-- Lihat — semua role --}}
                        <a href="{{ route('pengumuman.show', encrypt_id($item->id_pengumuman)) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="bi bi-eye"></i>
                        </a>

                        {{-- Edit — admin & operator --}}
                        @if(in_array(Auth::user()->role, ['admin', 'operator']))
                            <a href="{{ route('pengumuman.edit', encrypt_id($item->id_pengumuman)) }}"
                               class="btn btn-sm btn-outline-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                        @endif

                        {{-- Hapus — cuma admin --}}
                        @if(Auth::user()->role === 'admin')
                            <form action="{{ route('pengumuman.destroy', encrypt_id($item->id_pengumuman)) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-megaphone fs-1 d-block mb-3"></i>
                        <p class="mb-0">Belum ada data pengumuman.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pengumuman->hasPages())
        <div class="mt-3">{{ $pengumuman->links('pagination::bootstrap-5') }}</div>
    @endif
</div>
@endsection
