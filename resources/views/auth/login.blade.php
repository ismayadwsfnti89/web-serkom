@extends('layouts.auth')

@section('title', 'Login')
@section('meta_description', 'Login ke panel admin ' . ($profil->nama_sekolah ?? 'Web Sekolah'))

@section('content')
<div class="auth-card">

    {{-- Brand / Logo --}}
    <div class="text-center mb-4">
        <div class="brand-logo">
            @if(!empty($profil->logo))
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
            @else
                <i class="bi bi-mortarboard-fill"></i>
            @endif
        </div>
        <h2 class="fw-bold mb-2">{{ $profil->nama_sekolah ?? 'Web Sekolah' }}</h2>
        <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if($errors->any())
        <div class="alert alert-danger d-flex align-items-center gap-2">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        {{-- Username --}}
        <div class="mb-3">
            <label for="username" class="form-label fw-medium">Username</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person"></i>
                </span>
                <input type="text"
                       name="username"
                       id="username"
                       class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username') }}"
                       placeholder="Masukkan username"
                       required
                       autofocus>
            </div>
        </div>

        {{-- Password + Toggle --}}
        <div class="mb-3">
            <label for="password" class="form-label fw-medium">Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control border-end-0"
                       placeholder="Masukkan password"
                       required>
                <button type="button"
                        class="toggle-password input-group-text"
                        id="togglePassword"
                        title="Lihat password"
                        aria-label="Lihat password">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                </button>
            </div>
        </div>

        {{-- Ingat saya --}}
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Ingat saya
            </label>
        </div>

        {{-- Tombol Login --}}
        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
            <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
    </form>

    <hr class="my-4">

    <p class="text-center text-muted small mb-0">
        &copy; {{ date('Y') }} {{ $profil->nama_sekolah ?? 'Web Sekolah' }}
    </p>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';

                toggleIcon.classList.toggle('bi-eye');
                toggleIcon.classList.toggle('bi-eye-slash');

                toggleBtn.title = isPassword ? 'Sembunyikan password' : 'Lihat password';
            });
        }
    });
</script>
@endpush