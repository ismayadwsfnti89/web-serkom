@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold">Edit Galeri</h1>
    <p class="text-muted mb-0">Edit data: {{ $galeri->judul }}</p>
</div>

<div class="dashboard-card">
    <form action="{{ route('galeri.update', encrypt_id($galeri->id_galeri)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul"
                       class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul', $galeri->judul) }}"
                       maxlength="50" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select" required>
                    <option value="Foto" {{ old('kategori', $galeri->kategori) === 'Foto' ? 'selected' : '' }}>Foto</option>
                    <option value="Video" {{ old('kategori', $galeri->kategori) === 'Video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal"
                       class="form-control"
                       value="{{ old('tanggal', $galeri->tanggal) }}">
            </div>

            <div class="col-md-12">
                <label class="form-label">File (Foto/Video)</label>
                <input type="file" name="file"
                       class="form-control @error('file') is-invalid @enderror"
                       accept="image/*,video/*">
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>

                @if($galeri->file)
                    <div class="mt-3">
                        @if($galeri->kategori === 'Foto')
                            <img src="{{ asset('uploads/galeri/' . $galeri->file) }}"
                                 alt="{{ $galeri->judul }}"
                                 class="rounded"
                                 style="max-width: 200px; max-height: 200px; object-fit: cover;">
                        @else
                            <video controls style="max-width: 300px; max-height: 200px;">
                                <source src="{{ asset('uploads/galeri/' . $galeri->file) }}">
                            </video>
                        @endif
                        <small class="text-muted d-block mt-1">File saat ini</small>
                    </div>
                @endif
            </div>

            <div class="col-12">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" rows="3"
                          class="form-control">{{ old('keterangan', $galeri->keterangan) }}</textarea>
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-check-circle me-2"></i>Update
            </button>
            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle me-2"></i>Batal
            </a>
        </div>
    </form>
</div>
@endsection
