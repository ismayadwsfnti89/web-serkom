@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Edit Berita</h1>
        <p class="text-muted mb-0">Edit berita: {{ Str::limit($berita->judul, 60) }}</p>
    </div>

    <div class="dashboard-card">
        <form action="{{ route('berita.update', encrypt_id($berita->id_berita)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $berita->judul) }}"
                           maxlength="255" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', $berita->tanggal) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Publish" {{ old('status', $berita->status) === 'Publish' ? 'selected' : '' }}>Publish</option>
                        <option value="Draft" {{ old('status', $berita->status) === 'Draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>

                    @if($berita->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="rounded"
                                 width="150" height="100"
                                 style="object-fit: cover;">
                            <small class="text-muted d-block mt-1">Gambar saat ini</small>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label">Isi Berita <span class="text-danger">*</span></label>
                    <textarea name="isi" rows="10"
                              class="form-control @error('isi') is-invalid @enderror"
                              required>{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Update
                </button>
                <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection