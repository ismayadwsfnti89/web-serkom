@extends('layouts.app')

@section('title', 'Daftar Ekstrakurikuler')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Daftar Ekstrakurikuler</h1>
            <p class="text-muted mb-0">Kelola kegiatan ekstrakurikuler sekolah</p>
        </div>
        <a href="{{ route('ekskul.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Ekstrakurikuler
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
                        <th width="100">Gambar</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Pembina</th>
                        <th>Jadwal Latihan</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ekskul as $index => $item)
                    <tr>
                        <td>{{ $ekskul->firstItem() + $index }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}"
                                     alt="{{ $item->nama_ekskul }}"
                                     class="rounded"
                                     width="60" height="60"
                                     style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="width: 60px; height: 60px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $item->nama_ekskul }}</td>
                        <td>{{ $item->pembina ?? '-' }}</td>
                        <td>{{ $item->jadwal_latihan ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('ekskul.show', $item->id_ekskul) }}"
                               class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('ekskul.edit', $item->id_ekskul) }}"
                               class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('ekskul.destroy', $item->id_ekskul) }}"
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
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data ekstrakurikuler
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $ekskul->links() }}
        </div>
    </div>

</div>
@endsection