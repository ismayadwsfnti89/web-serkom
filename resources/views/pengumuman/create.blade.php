@extends('layouts.app')

@section('title', 'Tambah Pengumuman')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold">Tambah Pengumuman</h1>
    <p class="text-muted mb-0">Isi form di bawah untuk menambah pengumuman</p>
</div>

<div class="dashboard-card">
    <form action="{{ route('pengumuman.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul"
                       class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}"
                       maxlength="50" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                <input type="date" name="tanggal"
                       class="form-control @error('tanggal') is-invalid @enderror"
                       value="{{ old('tanggal', date('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Publish" {{ old('status') === 'Publish' ? 'selected' : '' }}>Publish</option>
                    <option value="Draft" {{ old('status') === 'Draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label">Isi Pengumuman <span class="text-danger">*</span></label>
                <textarea name="isi" rows="8"
                          class="form-control @error('isi') is-invalid @enderror"
                          required>{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-check-circle me-2"></i>Simpan
            </button>
            <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle me-2"></i>Batal
            </a>
        </div>
    </form>
</div>
@endsection
