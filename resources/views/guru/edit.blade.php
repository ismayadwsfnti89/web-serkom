@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Edit Guru</h1>
        <p class="text-muted mb-0">Edit data: {{ $guru->nama_guru }}</p>
    </div>

    <div class="dashboard-card">
        <form action="{{ route('guru.update', encrypt_id($guru->id_guru)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Guru <span class="text-danger">*</span></label>
                    <input type="text" name="nama_guru"
                           class="form-control @error('nama_guru') is-invalid @enderror"
                           value="{{ old('nama_guru', $guru->nama_guru) }}"
                           maxlength="40" required>
                    @error('nama_guru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip"
                           class="form-control @error('nip') is-invalid @enderror"
                           value="{{ old('nip', $guru->nip) }}"
                           maxlength="15">
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan"
                           class="form-control @error('jabatan') is-invalid @enderror"
                           value="{{ old('jabatan', $guru->jabatan) }}"
                           maxlength="100">
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel"
                           class="form-control @error('mapel') is-invalid @enderror"
                           value="{{ old('mapel', $guru->mapel) }}"
                           maxlength="40">
                    @error('mapel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Foto Guru</label>
                    <input type="file" name="foto"
                           class="form-control @error('foto') is-invalid @enderror"
                           accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>

                    @if($guru->foto)
                        <div class="mt-3">
                            <img src="{{ asset('uploads/guru/' . $guru->foto) }}"
                                 alt="{{ $guru->nama_guru }}"
                                 class="rounded"
                                 width="100" height="100"
                                 style="object-fit: cover;">
                            <small class="text-muted d-block mt-1">Foto saat ini</small>
                        </div>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Update
                </button>
                <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection
