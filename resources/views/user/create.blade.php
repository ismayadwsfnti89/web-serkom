@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold">Tambah User</h1>
    <p class="text-muted mb-0">Isi form di bawah untuk menambah user</p>
</div>

<div class="dashboard-card">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" name="username"
                       class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Role <span class="text-danger">*</span></label>
                <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-check-circle me-2"></i>Simpan
            </button>
            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle me-2"></i>Batal
            </a>
        </div>
    </form>
</div>
@endsection
