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
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
        }
        .auth-card {
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 420px;
        }
        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
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