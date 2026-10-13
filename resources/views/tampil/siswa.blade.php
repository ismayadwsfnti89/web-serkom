@extends('layouts.tampil')
@section('title', 'Data Siswa')
@section('subtitle', 'Siswa-siswi aktif sekolah kami')

@section('content')
<div class="row g-3">
    @forelse($siswa as $item)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="ratio ratio-1x1">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_siswa) }}&background=0284c7&color=fff&size=200"
                         alt="{{ $item->nama_siswa }}"
                         class="object-fit-cover">
                </div>
                <div class="card-body p-3">
                    <h6 class="fw-bold mb-1">{{ $item->nama_siswa }}</h6>
                    <small class="text-muted d-block mb-2">NISN: {{ $item->nisn }}</small>
                    <span class="badge {{ $item->jenis_kelamin === 'Laki-Laki' ? 'bg-primary' : 'bg-danger' }}">
                        {{ $item->jenis_kelamin }}
                    </span>
                    @if($item->tahun_masuk)
                        <small class="text-muted d-block mt-2">
                            <i class="bi bi-calendar3 me-1"></i>{{ $item->tahun_masuk }}
                        </small>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="bi bi-people fs-1 d-block mb-3"></i>
            <p>Belum ada data siswa.</p>
        </div>
    @endforelse
</div>

@if($siswa->hasPages())
    <div class="mt-4">{{ $siswa->links('pagination::bootstrap-5') }}</div>
@endif
@endsection