<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website Resmi ' . ($profil?->nama_sekolah ?? 'Sekolah'))">
    <title>@yield('title', 'Beranda') - {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .navbar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        .hero-section {
            background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
            color: #fff;
        }
        html {
            scroll-behavior: smooth;
        }
        
    </style>
</head>
<body>

{{-- ============ NAVBAR ============ --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="#beranda">
            @if($profil?->logo)
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
            @else
                <span class="badge bg-danger p-2 rounded-3">
                    <i class="bi bi-mortarboard-fill fs-5"></i>
                </span>
            @endif
            <span>{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLanding">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navLanding">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#guru">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#prestasi">Prestasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                @auth
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-sm px-3">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- ============ KONTEN ============ --}}
@yield('content')

{{-- ============ FOOTER ============ --}}
<footer class="bg-dark text-secondary pt-5" id="kontak">
    <div class="container">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-lg-6 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    @if($profil?->logo)
                        <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                             alt="Logo" width="40" height="40" style="object-fit: contain;">
                    @else
                        <span class="badge bg-danger p-2 rounded-3">
                            <i class="bi bi-mortarboard-fill fs-5"></i>
                        </span>
                    @endif
                    <h5 class="text-white mb-0">{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</h5>
                </div>
                @if($profil?->deskripsi)
                    <p class="small">{{ Str::limit($profil->deskripsi, 120) }}</p>
                @endif
            </div>

            {{-- Kontak --}}
            <div class="col-lg-6 col-md-6">
                <h5 class="text-white mb-3">Kontak</h5>
                <ul class="list-unstyled small">
                    @if($profil?->alamat)
                        <li class="mb-2"><i class="bi bi-geo-alt-fill text-warning me-2"></i>{{ $profil->alamat }}</li>
                    @endif
                    @if($profil?->kontak)
                        <li class="mb-2"><i class="bi bi-telephone-fill text-warning me-2"></i>{{ $profil->kontak }}</li>
                    @endif
                    @if($profil?->npsn)
                        <li class="mb-2"><i class="bi bi-hash text-warning me-2"></i>NPSN: {{ $profil->npsn }}</li>
                    @endif
                </ul>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="text-center small pb-4">
            &copy; {{ date('Y') }} {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}. All rights reserved.
        </div>
    </div>
</footer>

{{-- ============ BACK TO TOP ============ --}}
<button class="btn btn-danger position-fixed bottom-0 end-0 m-3 d-none" id="backToTop">
    <i class="bi bi-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Back to top
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 400) {
            backToTop.classList.remove('d-none');
        } else {
            backToTop.classList.add('d-none');
        }
    });
    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

@stack('scripts')
</body>
</html>
