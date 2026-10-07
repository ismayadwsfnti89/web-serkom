@extends('layouts.app')

@section('title', 'Data Guru')

@section('breadcrumb')
    <li class="breadcrumb-item active">Data Guru</li>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1 fw-bold">Data Guru</h3>
        <p class="text-muted mb-0">Kelola data guru sekolah</p>
    </div>

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('guru.create') }}" class="btn btn-danger">
            <i class="bi bi-plus-circle me-2"></i>Tambah Guru
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<x-search-bar
    :action="route('guru.index')"
    placeholder="Cari nama, NIP, jabatan, atau mapel..."
    :value="request('search')"
/>

<div class="dashboard-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="60">No</th>
                    <th width="80">Foto</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Jabatan</th>
                    <th>Mapel</th>
                    <th width="170" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guru as $item)
                    <tr>
                        <td>{{ $guru->firstItem() + $loop->index }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('uploads/guru/' . $item->foto) }}"
                                     alt="{{ $item->nama_guru }}"
                                     class="rounded-circle"
                                     width="40" height="40"
                                     style="object-fit: cover;">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_guru) }}&background=dc3545&color=fff&size=40"
                                     alt="{{ $item->nama_guru }}"
                                     class="rounded-circle"
                                     width="40" height="40">
                            @endif
                        </td>
                        <td>{{ $item->nip ?? '-' }}</td>
                        <td class="fw-semibold">{{ $item->nama_guru }}</td>
                        <td>{{ $item->jabatan ?? '-' }}</td>
                        <td>{{ $item->mapel ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('guru.show', encrypt_id($item->id_guru)) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="bi bi-eye"></i>
                            </a>

                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('guru.edit', encrypt_id($item->id_guru)) }}"
                                   class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('guru.destroy', encrypt_id($item->id_guru)) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus guru ini?')">
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
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">Belum ada data guru.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($guru->hasPages())
        <div class="mt-3">{{ $guru->links() }}</div>
    @endif
</div>
@endsection
