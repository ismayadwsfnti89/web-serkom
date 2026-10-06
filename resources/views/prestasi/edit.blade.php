@extends('layouts.app')

@section('title', 'Edit Prestasi')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Edit Prestasi</h1>
        <p class="text-muted mb-0">Edit data: {{ $prestasi->nama_prestasi }}</p>
    </div>

    <div class="dashboard-card">
        <form action="{{ route('prestasi.update', encrypt_id($prestasi->id_prestasi)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Nama Prestasi <span class="text-danger">*</span></label>
                    <input type="text" name="nama_prestasi"
                           class="form-control @error('nama_prestasi') is-invalid @enderror"
                           value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}"
                           maxlength="100" required>
                    @error('nama_prestasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tingkat <span class="text-danger">*</span></label>
                    <select name="tingkat" class="form-select" required>
                        <option value="Sekolah" {{ old('tingkat', $prestasi->tingkat) === 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                        <option value="Kecamatan" {{ old('tingkat', $prestasi->tingkat) === 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                        <option value="Kabupaten" {{ old('tingkat', $prestasi->tingkat) === 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                        <option value="Provinsi" {{ old('tingkat', $prestasi->tingkat) === 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="Nasional" {{ old('tingkat', $prestasi->tingkat) === 'Nasional' ? 'selected' : '' }}>Nasional</option>
                        <option value="Internasional" {{ old('tingkat', $prestasi->tingkat) === 'Internasional' ? 'selected' : '' }}>Internasional</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Juara</label>
                    <select name="juara" class="form-select">
                        <option value="">-- Pilih Juara --</option>
                        <option value="Juara 1" {{ old('juara', $prestasi->juara) === 'Juara 1' ? 'selected' : '' }}>Juara 1</option>
                        <option value="Juara 2" {{ old('juara', $prestasi->juara) === 'Juara 2' ? 'selected' : '' }}>Juara 2</option>
                        <option value="Juara 3" {{ old('juara', $prestasi->juara) === 'Juara 3' ? 'selected' : '' }}>Juara 3</option>
                        <option value="Harapan 1" {{ old('juara', $prestasi->juara) === 'Harapan 1' ? 'selected' : '' }}>Harapan 1</option>
                        <option value="Harapan 2" {{ old('juara', $prestasi->juara) === 'Harapan 2' ? 'selected' : '' }}>Harapan 2</option>
                        <option value="Peserta" {{ old('juara', $prestasi->juara) === 'Peserta' ? 'selected' : '' }}>Peserta</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun"
                           class="form-control"
                           value="{{ old('tahun', $prestasi->tahun) }}"
                           min="2000" max="2099">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto"
                           class="form-control @error('foto') is-invalid @enderror"
                           accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>

                    @if($prestasi->foto)
                        <div class="mt-2">
                            <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                                 alt="{{ $prestasi->nama_prestasi }}"
                                 class="rounded"
                                 width="100" height="100"
                                 style="object-fit: cover;">
                            <small class="text-muted d-block mt-1">Foto saat ini</small>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="form-control">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Update
                </button>
                <a href="{{ route('prestasi.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection