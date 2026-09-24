<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Web Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
        }
        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #4361ee, #6366f1);
            border-radius: 16px;
            margin-bottom: 20px;
        }
        .brand-logo i {
            font-size: 36px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="brand-logo">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h2 class="fw-bold mb-2">Web Sekolah</h2>
            <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
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

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>
                </div>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Ingat saya
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>
        </form>

        <hr class="my-4">
        <p class="text-center text-muted small mb-0">
            &copy; {{ date('Y') }} Web Sekolah. All rights reserved.
        </p>
    </div>
</body>
</html>
