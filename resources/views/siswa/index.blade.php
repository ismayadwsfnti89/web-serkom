@extends('layouts.app')

@section('title', 'Data Siswa')

@section('breadcrumb')
    <li class="breadcrumb-item active">Data Siswa</li>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1 fw-bold">Data Siswa</h3>
        <p class="text-muted mb-0">Kelola data siswa sekolah</p>
    </div>

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Siswa
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Search Bar --}}
<x-search-bar
    :action="route('siswa.index')"
    placeholder="Cari NISN, nama, atau tahun masuk..."
    :value="request('search')"
/>

<div class="dashboard-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th width="170" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $item)
                    <tr>
                        <td>{{ $siswa->firstItem() + $loop->index }}</td>
                        <td><span class="badge bg-light text-dark">{{ $item->nisn }}</span></td>
                        <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                        <td>
                            @if($item->jenis_kelamin === 'Laki-Laki')
                                <span class="badge bg-primary">Laki-Laki</span>
                            @else
                                <span class="badge" style="background:#ec4899;">Perempuan</span>
                            @endif
                        </td>
                        <td>{{ $item->tahun_masuk ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('siswa.show', $item->id_siswa) }}"
                               class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>

                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('siswa.edit', $item->id_siswa) }}"
                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('siswa.destroy', $item->id_siswa) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus siswa &quot;{{ $item->nama_siswa }}&quot;? Data yang dihapus tidak bisa dikembalikan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            @if(request('search'))
                                <i class="bi bi-search fs-1 d-block mb-3 opacity-50"></i>
                                <p class="mb-1 fw-medium">Tidak ada siswa yang cocok</p>
                                <p class="small mb-0">Coba kata kunci lain atau reset pencarian.</p>
                            @else
                                <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                                <p class="mb-1 fw-medium">Belum ada data siswa</p>
                                <p class="small mb-0">Mulai tambahkan siswa pertama.</p>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($siswa->hasPages())
        <div class="mt-3">
            {{ $siswa->links() }}
        </div>
    @endif
</div>
@endsection