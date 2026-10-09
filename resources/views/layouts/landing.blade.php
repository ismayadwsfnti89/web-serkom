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
    <link href="{{ asset('css/warna-sekolah.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
            background: linear-gradient(135deg, #0284c7 0%, #075985 100%);
            color: #fff;
        }
        html {
            scroll-behavior: smooth;
        }
        .hero-slide {
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.55) 0%, rgba(7, 89, 133, 0.70) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }

        /* ===== Navbar aktif saat scroll ===== */
        .navbar-nav .nav-link {
            position: relative;
            transition: color 0.2s;
            padding-bottom: 6px;
        }
        .navbar-nav .nav-link:hover {
            color: #0284c7;
        }
        .navbar-nav .nav-link.active {
            color: #0284c7 !important;
            font-weight: 600;
        }
        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 8px;
            right: 8px;
            height: 3px;
            background: #0284c7;
            border-radius: 3px;
        }
        .visi-misi-card
        {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-left: 5px solid #0284c7 !important;
        }
        .visi-misi-card .card-body {
            padding: 24px;
        }
        /* ===== Hover Card ===== */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        /* Hover gambar di dalam card */
        .card img {
            transition: transform 0.5s ease;
        }
        .card:hover img {
            transform: scale(1.05);
        }

        /* Hover badge */
        .badge {
            transition: transform 0.2s;
        }
        .badge:hover {
            transform: scale(1.05);
        }

        /* Hover tombol */
        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
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
                <li class="nav-item"><a class="nav-link nav-scroll" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#guru">Guru</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#berita">Berita</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#prestasi">Prestasi</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#ekskul">Ekskul</a></li>
                <li class="nav-item"><a class="nav-link nav-scroll" href="#pengumuman">Pengumuman</a></li>
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
                    <p class="small">{{ Str::limit($profil->deskripsi, 2000) }}</p>
                @endif
            </div>

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
    // ===== Back to top =====
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

    // ===== Navbar aktif saat scroll =====
    document.addEventListener('DOMContentLoaded', function () {
        const sections = document.querySelectorAll('section[id], footer[id]');
        const navLinks = document.querySelectorAll('.nav-scroll');

        function setActiveLink() {
            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (window.scrollY >= (sectionTop - 150)) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', setActiveLink);
        setActiveLink();
    });

</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 700,
        once: true,
        offset: 100,
    });
</script>

@stack('scripts')
</body>
</html>
