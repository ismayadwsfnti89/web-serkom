@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="auth-card">

    <div class="text-center mb-4">
        <div class="brand-logo">
            @if($profil?->logo)
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
            @else
                <i class="bi bi-mortarboard-fill"></i>
            @endif
        </div>
        <h2 class="fw-bold mb-2">{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</h2>
        <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person"></i>
                </span>
                <input type="text"
                       name="username"
                       id="username"
                       class="form-control"
                       value="{{ old('username') }}"
                       placeholder="Masukkan username"
                       required autofocus>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
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
                        id="togglePassword">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                </button>
            </div>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-danger w-100 py-2">
            <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
    </form>

    <hr class="my-4">

    <p class="text-center text-muted small mb-0">
        &copy; {{ date('Y') }} {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}
    </p>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    });
</script>
@endpush
