@extends('layouts.app')

@section('title', 'Profil Saya')

@section('breadcrumb')
    <li class="breadcrumb-item active">Profil Saya</li>
@endsection

@section('content')
<div class="mb-4">
    <h3 class="mb-1 fw-bold">Profil Saya</h3>
    <p class="text-muted mb-0">Ubah data diri dan password Anda</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="dashboard-card">
    <form action="{{ route('profil.saya.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $user->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Username</label>
                <input type="text" class="form-control"
                       value="{{ $user->username }}" disabled>
                <small class="text-muted">Username tidak bisa diubah</small>
            </div>

            <div class="col-12">
                <hr class="my-2">
                <h6 class="fw-bold mb-1">Ubah Password (opsional)</h6>
                <p class="text-muted small mb-3">Biarkan kosong jika tidak ingin mengubah password</p>
            </div>

            <div class="col-md-6">
                <label class="form-label">Password Baru</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Minimal 6 karakter">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       placeholder="Ulangi password baru">
            </div>
        </div>

        <hr class="my-4">

        <button type="submit" class="btn btn-danger">
            <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
        </button>
    </form>
</div>
@endsection