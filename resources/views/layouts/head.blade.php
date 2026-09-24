<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Web Sekolah - Dashboard')">
    <meta name="author" content="Web Sekolah">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - Web Sekolah</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f5f7fa;
        }

        /* ============ SIDEBAR ============ */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: #1f2937;
            color: #fff;
            z-index: 1040;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 20px 24px;
            border-bottom: 1px solid #374151;
        }
        .sidebar-brand h5 {
            color: #fff;
            margin: 0;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .sidebar-nav {
            padding: 16px 0;
        }
        .menu-section {
            margin-bottom: 24px;
        }
        .menu-section-title {
            padding: 8px 24px;
            font-size: 0.7rem;
            text-transform: uppercase;
            color: #6b7280;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .sidebar .nav-link {
            color: #d1d5db;
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
            background: #374151;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: #374151;
            border-left-color: #6366f1;
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
            background: #f5f7fa;
        }

        /* ============ TOP NAVBAR ============ */
        .top-navbar {
            background: #fff;
            height: 64px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        .top-navbar .breadcrumb {
            font-size: 0.875rem;
            margin: 0;
        }
        .top-navbar .breadcrumb-item a {
            color: #6366f1;
            text-decoration: none;
        }

        /* ============ CONTENT ============ */
        .dashboard-content {
            padding: 24px;
        }

        /* ============ CARDS ============ */
        .dashboard-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .stats-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        }
        .stats-card-label {
            font-size: 0.75rem;
            color: #6b7280;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .stats-card-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            line-height: 1;
        }

        /* ============ FOOTER ============ */
        .dashboard-footer {
            padding: 20px 24px;
            color: #6b7280;
            font-size: 0.875rem;
            background: #fff;
            margin-top: 24px;
            border-top: 1px solid #e5e7eb;
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('layouts.sidebar')
