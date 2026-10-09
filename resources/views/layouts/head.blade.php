<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('meta_description', 'Web Sekolah - Dashboard')">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Dashboard') - {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</title>

<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('css/warna-sekolah.css') }}" rel="stylesheet">

<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background: #f0f9ff;
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 260px;
        height: 100vh;
        background: linear-gradient(180deg, #075985 0%, #0c4a6e 100%);
        color: #fff;
        z-index: 1040;
        overflow-y: auto;
    }
    .sidebar-brand {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sidebar-brand img {
        width: 38px;
        height: 38px;
        object-fit: contain;
        background: rgba(255,255,255,0.1);
        border-radius: 8px;
        padding: 4px;
    }
    .sidebar-brand h5 {
        color: #fff;
        margin: 0;
        font-weight: 700;
        font-size: 1rem;
        line-height: 1.2;
    }
    .sidebar-brand small {
        color: #bae6fd;
        font-size: 0.7rem;
    }
    .menu-section {
        margin-top: 16px;
    }
    .menu-section-title {
        padding: 8px 24px;
        font-size: 0.7rem;
        text-transform: uppercase;
        color: #bae6fd;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .sidebar .nav-link {
        color: #e0f2fe;
        padding: 10px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.9rem;
    }
    .sidebar .nav-link:hover {
        color: #fff;
        background: rgba(255,255,255,0.08);
    }
    .sidebar .nav-link.active {
        color: #fff;
        background: #0284c7;
        font-weight: 600;
        border-left: 4px solid #38bdf8;
    }
    .sidebar .nav-link i {
        width: 20px;
        text-align: center;
    }

    /* Main wrapper */
    .main-wrapper {
        margin-left: 260px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Top navbar */
    .top-navbar {
        background: #fff;
        height: 64px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        padding: 0 24px;
        position: sticky;
        top: 0;
        z-index: 1020;
    }

    /* Content */
    .dashboard-content {
        padding: 24px;
        flex: 1;
    }

    /* Cards */
    .dashboard-card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }
    .stats-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .stats-card-label {
        font-size: 0.75rem;
        color: #6c757d;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 4px;
    }
    .stats-card-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: #212529;
    }

    /* Footer */
    .dashboard-footer {
        padding: 20px 24px;
        color: #6c757d;
        font-size: 0.875rem;
        background: #fff;
        border-top: 1px solid #dee2e6;
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.2s;
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .main-wrapper {
            margin-left: 0;
        }
    }
</style>

@stack('styles')
