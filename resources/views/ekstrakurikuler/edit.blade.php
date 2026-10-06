@extends('layouts.app')

@section('title', 'Edit Ekstrakurikuler')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Edit Ekstrakurikuler</h1>
        <p class="text-muted mb-0">Edit data: {{ $ekskul->nama_ekskul }}</p>
    </div>

    <div class="dashboard-card">
        <form action="{{ route('ekskul.update', encrypt_id($ekskul->id_ekskul)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                    <input type="text" name="nama_ekskul"
                           class="form-control @error('nama_ekskul') is-invalid @enderror"
                           value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}"
                           maxlength="40" required>
                    @error('nama_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina"
                           class="form-control @error('pembina') is-invalid @enderror"
                           value="{{ old('pembina', $ekskul->pembina) }}"
                           maxlength="40">
                    @error('pembina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan"
                           class="form-control @error('jadwal_latihan') is-invalid @enderror"
                           value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan) }}"
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
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>

                    @if($ekskul->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}"
                                 alt="{{ $ekskul->nama_ekskul }}"
                                 class="rounded"
                                 width="100" height="100"
                                 style="object-fit: cover;">
                            <small class="text-muted d-block mt-1">Gambar saat ini</small>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="form-control">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Update
                </button>
                <a href="{{ route('ekskul.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection