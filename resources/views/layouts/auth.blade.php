<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Login - ' . ($profil->nama_sekolah ?? 'Web Sekolah'))">

    <title>@yield('title', 'Login') - {{ $profil->nama_sekolah ?? 'Web Sekolah' }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #b91c1c;
            --primary-dark: #7f1d1d;
            --primary-light: #fef2f2;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;

            /* Fallback gradient kalau foto belum ada */
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        /* Background foto sekolah */
        body.has-photo {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Overlay gelap biar form tetap kebaca */
        body.has-photo::before {
            content: '';
            position: fixed;
            inset: 0;
            background: linear-gradient(
                135deg,
                rgba(127, 29, 29, 0.85) 0%,
                rgba(0, 0, 0, 0.75) 100%
            );
            z-index: 0;
        }

        .auth-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 16px;
            margin-bottom: 20px;
        }

        .brand-logo i {
            font-size: 36px;
            color: #fff;
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(185, 28, 28, 0.15);
        }

        .input-group-text {
            background: var(--primary-light);
            border-color: #e5e7eb;
            color: var(--primary);
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .toggle-password {
            cursor: pointer;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-left: 0;
            color: #6b7280;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--primary);
        }

        @media (max-width: 480px) {
            .auth-card {
                padding: 28px 24px;
            }

            body.has-photo {
                background-attachment: scroll;
            }
        }
    </style>

    {{-- Style inline untuk background foto (kalau ada) --}}
    @if(!empty($profil->foto))
        <style>
            body {
                background-image: url('{{ asset('uploads/profil/' . $profil->foto) }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    @endif

    @stack('styles')
</head>
<body class="{{ !empty($profil->foto) ? 'has-photo' : '' }}">

    {{-- Konten --}}
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>