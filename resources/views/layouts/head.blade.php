<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('meta_description', 'Web Sekolah - Dashboard')">
<meta name="author" content="Web Sekolah">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Dashboard') - {{ $profil->nama_sekolah ?? 'Web Sekolah' }}</title>

<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    :root {
        --primary: #b91c1c;
        --primary-dark: #7f1d1d;
        --primary-light: #fef2f2;
        --primary-soft: #fee2e2;
        --sidebar-bg: #450a0a;
        --sidebar-hover: #7f1d1d;
        --sidebar-active: #b91c1c;
        --sidebar-text: #fecaca;
        --dark: #1f2937;
        --gray: #6b7280;
        --gray-light: #f5f7fa;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background: var(--gray-light);
    }

    /* ============ SIDEBAR ============ */
    .sidebar {
        position: fixed;
        left: 0; top: 0;
        width: 260px;
        height: 100vh;
        background: var(--sidebar-bg);
        color: #fff;
        z-index: 1040;
        overflow-y: auto;
        border-right: 1px solid rgba(255,255,255,0.05);
    }
    .sidebar-brand {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sidebar-brand img {
        width: 38px; height: 38px;
        object-fit: contain;
        background: rgba(255,255,255,0.1);
        border-radius: 8px;
        padding: 4px;
    }
    .sidebar-brand i {
        color: var(--primary-soft);
        font-size: 1.5rem;
    }
    .sidebar-brand h5 {
        color: #fff;
        margin: 0;
        font-weight: 700;
        font-size: 1rem;
        line-height: 1.2;
    }
    .sidebar-brand small {
        color: var(--sidebar-text);
        font-size: 0.7rem;
        display: block;
        margin-top: 2px;
    }
    .sidebar-nav { padding: 16px 0; }
    .menu-section { margin-bottom: 24px; }
    .menu-section-title {
        padding: 8px 24px;
        font-size: 0.7rem;
        text-transform: uppercase;
        color: #f87171;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .sidebar .nav-link {
        color: var(--sidebar-text);
        padding: 10px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        transition: all 0.2s;
        font-size: 0.9rem;
        border-left: 3px solid transparent;
    }
    .sidebar .nav-link:hover {
        color: #fff;
        background: var(--sidebar-hover);
    }
    .sidebar .nav-link.active {
        color: #fff;
        background: var(--sidebar-active);
        border-left-color: #fca5a5;
        font-weight: 600;
    }
    .sidebar .nav-link i {
        font-size: 1rem;
        width: 20px;
        text-align: center;
    }

    /* ============ MAIN WRAPPER ============ */
    .main-wrapper {
        margin-left: 260px;
        min-height: 100vh;
        background: var(--gray-light);
        display: flex;
        flex-direction: column;
    }

    /* ============ TOP NAVBAR ============ */
    .top-navbar {
        background: #fff;
        height: 64px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        padding: 0 24px;
        position: sticky;
        top: 0;
        z-index: 1020;
        border-bottom: 3px solid var(--primary);
    }
    .top-navbar .breadcrumb { font-size: 0.875rem; margin: 0; }
    .top-navbar .breadcrumb-item a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
    }
    .top-navbar .breadcrumb-item a:hover { color: var(--primary-dark); }
    .top-navbar .breadcrumb-item.active { color: var(--gray); }

    /* ============ CONTENT ============ */
    .dashboard-content {
        padding: 24px;
        flex: 1;
    }

    /* ============ CARDS ============ */
    .dashboard-card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        margin-bottom: 20px;
        border-top: 3px solid transparent;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .dashboard-card:hover {
        border-top-color: var(--primary);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .stats-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        border-top: 3px solid transparent;
    }
    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(185,28,28,0.12);
        border-top-color: var(--primary);
    }
    .stats-card-label {
        font-size: 0.75rem;
        color: var(--gray);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .stats-card-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark);
        line-height: 1;
    }

    /* ============ FOOTER ============ */
    .dashboard-footer {
        padding: 20px 24px;
        color: var(--gray);
        font-size: 0.875rem;
        background: #fff;
        border-top: 3px solid var(--primary);
    }

    /* ============ BUTTONS ============ */
    .btn-primary {
        background: var(--primary);
        border-color: var(--primary);
    }
    .btn-primary:hover,
    .btn-primary:focus {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
    }
    .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
    }
    .btn-outline-primary:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    /* ============ BADGE / TEXT ============ */
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    a { color: var(--primary); }
    a:hover { color: var(--primary-dark); }

    /* ============ FORM ============ */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(185,28,28,0.15);
    }
    .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    .form-label {
        font-weight: 500;
        font-size: 0.875rem;
        color: var(--dark);
    }

    /* ============ SEARCH BAR ============ */
    .input-group-text {
        background: #fff;
        border-color: #e5e7eb;
        color: #9ca3af;
    }
    .input-group .form-control:focus {
        border-color: #e5e7eb;
        box-shadow: none;
    }
    .input-group .form-control:focus + .btn-primary {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 991.98px) {
        .sidebar { transform: translateX(-100%); transition: transform 0.3s; }
        .sidebar.show { transform: translateX(0); }
        .main-wrapper { margin-left: 0; }
    }
</style>

@stack('styles')