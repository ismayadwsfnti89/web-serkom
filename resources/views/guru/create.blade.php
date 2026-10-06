@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Tambah Guru</h1>
        <p class="text-muted mb-0">Isi form di bawah untuk menambah data guru</p>
    </div>

    {{-- Form --}}
    <div class="dashboard-card">
        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Guru <span class="text-danger">*</span></label>
                    <input type="text" name="nama_guru"
                           class="form-control @error('nama_guru') is-invalid @enderror"
                           value="{{ old('nama_guru') }}"
                           placeholder="Contoh: Budi Santoso, S.Pd"
                           maxlength="40"
                           required>
                    @error('nama_guru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip"
                           class="form-control @error('nip') is-invalid @enderror"
                           value="{{ old('nip') }}"
                           placeholder="Contoh: 198501012010011001"
                           maxlength="30"
                           inputmode="numeric">
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Maksimal 30 karakter</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan"
                           class="form-control @error('jabatan') is-invalid @enderror"
                           value="{{ old('jabatan') }}"
                           placeholder="Contoh: Guru Tetap"
                           maxlength="100">
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel"
                           class="form-control @error('mapel') is-invalid @enderror"
                           value="{{ old('mapel') }}"
                           placeholder="Contoh: Matematika"
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
                    <small class="text-muted">Format: JPG, PNG. Max: 2MB</small>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Simpan
                </button>
                <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection