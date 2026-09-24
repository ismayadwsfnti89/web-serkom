@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Daftar Siswa</h1>
            <p class="text-muted mb-0">Kelola data siswa sekolah</p>
        </div>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Table --}}
    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Masuk</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa as $index => $item)
                    <tr>
                        <td>{{ $siswa->firstItem() + $index }}</td>
                        <td><code>{{ $item->nisn }}</code></td>
                        <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                        <td>
                            @if($item->jenis_kelamin === 'Laki-Laki')
                                <span class="badge bg-primary">Laki-Laki</span>
                            @else
                                <span class="badge bg-danger">Perempuan</span>
                            @endif
                        </td>
                        <td>{{ $item->tahun_masuk ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('siswa.show', $item->id_siswa) }}"
                               class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('siswa.edit', $item->id_siswa) }}"
                               class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('siswa.destroy', $item->id_siswa) }}"
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
                            Belum ada data siswa
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $siswa->links() }}
        </div>
    </div>

</div>
@endsection
