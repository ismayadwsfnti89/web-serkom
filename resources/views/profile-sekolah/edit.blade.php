@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Profil Sekolah</h1>
            <p class="text-muted mb-0">Kelola informasi profil sekolah</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="dashboard-card">
        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Foto & Logo --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Foto Sekolah</label>
                    <input type="file" name="foto"
                           class="form-control @error('foto') is-invalid @enderror"
                           accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Format: JPG, PNG. Max: 2MB</small>

                    @if($profil->foto)
                        <div class="mt-3">
                            <img src="{{ asset('uploads/profil/' . $profil->foto) }}"
                                 alt="Foto Sekolah"
                                 class="rounded"
                                 style="max-width: 200px; max-height: 150px; object-fit: cover;">
                            <small class="text-muted d-block mt-1">Foto saat ini</small>
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label">Logo Sekolah</label>
                    <input type="file" name="logo"
                           class="form-control @error('logo') is-invalid @enderror"
                           accept="image/*">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Format: JPG, PNG. Max: 2MB</small>

                    @if($profil->logo)
                        <div class="mt-3">
                            <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                                 alt="Logo Sekolah"
                                 class="rounded"
                                 style="max-width: 150px; max-height: 150px; object-fit: contain;">
                            <small class="text-muted d-block mt-1">Logo saat ini</small>
                        </div>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            {{-- Informasi Dasar --}}
            <h6 class="fw-semibold mb-3">
                <i class="bi bi-info-circle me-2"></i>Informasi Dasar
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label class="form-label">Nama Sekolah <span class="text-danger">*</span></label>
                    <input type="text" name="nama_sekolah"
                           class="form-control @error('nama_sekolah') is-invalid @enderror"
                           value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                           placeholder="Contoh: SMA Negeri 1 Jakarta"
                           maxlength="40" required>
                    @error('nama_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">NPSN</label>
                    <input type="text" name="npsn"
                           class="form-control @error('npsn') is-invalid @enderror"
                           value="{{ old('npsn', $profil->npsn) }}"
                           placeholder="Contoh: 12345678"
                           maxlength="10">
                    @error('npsn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah"
                           class="form-control @error('kepala_sekolah') is-invalid @enderror"
                           value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}"
                           placeholder="Contoh: Dr. Budi Santoso, M.Pd"
                           maxlength="40">
                    @error('kepala_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Tahun Berdiri</label>
                    <input type="number" name="tahun_berdiri"
                           class="form-control @error('tahun_berdiri') is-invalid @enderror"
                           value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                           placeholder="Contoh: 1995"
                           min="1900" max="2099">
                    @error('tahun_berdiri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Kontak</label>
                    <input type="text" name="kontak"
                           class="form-control @error('kontak') is-invalid @enderror"
                           value="{{ old('kontak', $profil->kontak) }}"
                           placeholder="Contoh: 021-1234567"
                           maxlength="15">
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="3"
                              class="form-control @error('alamat') is-invalid @enderror"
                              placeholder="Alamat lengkap sekolah...">{{ old('alamat', $profil->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            {{-- Visi & Misi --}}
            <h6 class="fw-semibold mb-3">
                <i class="bi bi-bullseye me-2"></i>Visi &amp; Misi
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-12">
                    <textarea name="visi_misi" rows="6"
                              class="form-control @error('visi_misi') is-invalid @enderror"
                              placeholder="Visi dan misi sekolah...">{{ old('visi_misi', $profil->visi_misi) }}</textarea>
                    @error('visi_misi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            {{-- Deskripsi --}}
            <h6 class="fw-semibold mb-3">
                <i class="bi bi-file-text me-2"></i>Deskripsi Sekolah
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-12">
                    <textarea name="deskripsi" rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Deskripsi singkat tentang sekolah...">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            {{-- Tombol Aksi --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Simpan Profil
                </button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection