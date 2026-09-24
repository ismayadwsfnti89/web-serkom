@extends('layouts.app')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Tambah Ekstrakurikuler</h1>
        <p class="text-muted mb-0">Isi form di bawah untuk menambah kegiatan ekstrakurikuler</p>
    </div>

    <div class="dashboard-card">
        <form action="{{ route('ekskul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                    <input type="text" name="nama_ekskul"
                           class="form-control @error('nama_ekskul') is-invalid @enderror"
                           value="{{ old('nama_ekskul') }}"
                           placeholder="Contoh: Pramuka, Basket, PMR"
                           maxlength="40" required>
                    @error('nama_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina"
                           class="form-control @error('pembina') is-invalid @enderror"
                           value="{{ old('pembina') }}"
                           placeholder="Contoh: Budi Santoso, S.Pd"
                           maxlength="40">
                    @error('pembina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan"
                           class="form-control @error('jadwal_latihan') is-invalid @enderror"
                           value="{{ old('jadwal_latihan') }}"
                           placeholder="Contoh: Sabtu 08:00-10:00"
                           maxlength="40">
                    @error('jadwal_latihan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Format: JPG, PNG. Max: 2MB</small>
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Deskripsi singkat tentang ekstrakurikuler...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Simpan
                </button>
                <a href="{{ route('ekskul.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection