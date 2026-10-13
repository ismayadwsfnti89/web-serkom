@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold">Tambah Galeri</h1>
    <p class="text-muted mb-0">Upload foto atau tambahkan link video YouTube</p>
</div>

<div class="dashboard-card">
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul"
                       class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}"
                       maxlength="50" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" id="kategori"
                        class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih --</option>
                    <option value="Foto" {{ old('kategori') === 'Foto' ? 'selected' : '' }}>Foto</option>
                    <option value="Video" {{ old('kategori') === 'Video' ? 'selected' : '' }}>Video</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal"
                       class="form-control @error('tanggal') is-invalid @enderror"
                       value="{{ old('tanggal', date('Y-m-d')) }}">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD FOTO (upload file) --}}
            <div class="col-md-12" id="field-foto">
                <label class="form-label">File Foto <span class="text-danger">*</span></label>
                <input type="file" name="file_foto"
                       class="form-control @error('file_foto') is-invalid @enderror"
                       accept="image/*">
                @error('file_foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
            </div>

            {{-- FIELD VIDEO (link YouTube) --}}
            <div class="col-md-12 d-none" id="field-video">
                <label class="form-label">Link YouTube <span class="text-danger">*</span></label>
                <input type="text" name="link_video"
                       class="form-control @error('link_video') is-invalid @enderror"
                       value="{{ old('link_video') }}"
                       placeholder="Contoh: https://www.youtube.com/watch?v=xxxxx">
                @error('link_video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Copy-paste link YouTube videonya</small>
            </div>

            <div class="col-12">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" rows="3"
                          class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-check-circle me-2"></i>Simpan
            </button>
            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle me-2"></i>Batal
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const kategori = document.getElementById('kategori');
    const fieldFoto = document.getElementById('field-foto');
    const fieldVideo = document.getElementById('field-video');

    function toggleField() {
        if (kategori.value === 'Video') {
            fieldFoto.classList.add('d-none');
            fieldVideo.classList.remove('d-none');
        } else {
            fieldFoto.classList.remove('d-none');
            fieldVideo.classList.add('d-none');
        }
    }

    kategori.addEventListener('change', toggleField);
    toggleField();
</script>
@endpush
