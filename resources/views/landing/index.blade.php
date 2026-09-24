<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Sekolah - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-mortarboard-fill me-2"></i>Web Sekolah
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                <i class="bi bi-box-arrow-in-right me-1"></i>Login Admin
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di Web Sekolah</h1>
            <p class="lead text-muted mb-4">Halaman publik sedang dalam pengembangan.</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login Admin
            </a>
        </div>
    </div>

</body>
</html>