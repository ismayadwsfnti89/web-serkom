<section class="hero-section py-5 position-relative" id="beranda" style="
    background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
    color: #fff;
    overflow: hidden;
">
    @if($profil?->foto)
        <div style="
            position: absolute;
            inset: 0;
            background-image: url('{{ asset('uploads/profil/' . $profil->foto) }}');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 0;
        "></div>
    @endif

    {{-- Konten hero --}}
    <div class="container py-5 position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark mb-3">
                    <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi B
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    {{ $profil?->nama_sekolah ?? 'Sekolah Kami' }}
                </h1>

                <p class="lead mb-4">
                    {{ Str::limit($profil?->deskripsi ?? 'Membangun generasi berprestasi dan berkarakter melalui pendidikan berkualitas.', 160) }}
                </p>
            </div>

            @if($profil?->logo)
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                         alt="Logo"
                         class="img-fluid" style="max-height: 280px;">
                </div>
            @endif
        </div>
    </div>
</section>
