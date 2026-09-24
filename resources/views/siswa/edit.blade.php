@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark">Edit Siswa</h1>
        <p class="text-muted mb-0">Edit data: {{ $siswa->nama_siswa }}</p>
    </div>

    {{-- Form --}}
    <div class="dashboard-card">
        <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">NISN <span class="text-danger">*</span></label>
                    <input type="text" name="nisn"
                           class="form-control @error('nisn') is-invalid @enderror"
                           value="{{ old('nisn', $siswa->nisn) }}"
                           maxlength="10"
                           required>
                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama_siswa"
                           class="form-control @error('nama_siswa') is-invalid @enderror"
                           value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                           maxlength="40"
                           required>
                    @error('nama_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk"
                           class="form-control @error('tahun_masuk') is-invalid @enderror"
                           value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                           min="2000"
                           max="2099">
                    @error('tahun_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Update
                </button>
                <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection
