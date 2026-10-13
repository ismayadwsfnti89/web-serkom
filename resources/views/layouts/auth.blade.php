<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') - {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/warna-sekolah.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;

            @if(isset($galeriLogin) && $galeriLogin)
                background-image: url('{{ asset('uploads/galeri/' . $galeriLogin->file) }}');
                background-size: cover;
                background-position: center;
            @else
                background: linear-gradient(135deg, #0284c7 0%, #075985 100%);
            @endif
        }

        /* Overlay biar form tetap kebaca */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.75) 0%, rgba(7, 89, 133, 0.85) 100%);
            z-index: 0;
        }

        .auth-card {
            position: relative;
            z-index: 1;
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
        }
        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #0284c7 0%, #075985 100%);
            border-radius: 12px;
            margin-bottom: 20px;
        }
        .brand-logo i { font-size: 36px; color: #fff; }
        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }
        .toggle-password {
            cursor: pointer;
            background: #fff;
            border: 1px solid #dee2e6;
            border-left: 0;
        }
        @media (max-width: 480px) {
            .auth-card { padding: 28px 24px; }
        }
    </style>

    @stack('styles')
</head>
<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
