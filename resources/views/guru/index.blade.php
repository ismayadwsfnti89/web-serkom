@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Daftar Guru</h1>
            <p class="text-muted mb-0">Kelola data guru sekolah</p>
        </div>
        <a href="{{ route('guru.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Guru
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
                        <th width="80">Foto</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Mata Pelajaran</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guru as $index => $item)
                    <tr>
                        <td>{{ $guru->firstItem() + $index }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('uploads/guru/' . $item->foto) }}"
                                     alt="{{ $item->nama_guru }}"
                                     class="rounded-circle"
                                     width="40" height="40"
                                     style="object-fit: cover;">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_guru) }}&background=6366f1&color=fff"
                                     alt="{{ $item->nama_guru }}"
                                     class="rounded-circle"
                                     width="40" height="40">
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $item->nama_guru }}</td>
                        <td>{{ $item->nip ?? '-' }}</td>
                        <td>{{ $item->jabatan ?? '-' }}</td>
                        <td>{{ $item->mapel ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('guru.show', $item->id_guru) }}"
                               class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('guru.edit', $item->id_guru) }}"
                               class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('guru.destroy', $item->id_guru) }}"
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
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data guru
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $guru->links() }}
        </div>
    </div>

</div>
@endsection
