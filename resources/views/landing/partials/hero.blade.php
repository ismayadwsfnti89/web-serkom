<section class="hero-section" id="beranda" style="
    position: relative;
    min-height: 560px;
    display: flex;
    align-items: center;
    color: #fff;
    overflow: hidden;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
">
    {{-- Background Foto Sekolah (kalau ada) --}}
    @if(!empty($profil->foto))
        <div style="
            position: absolute; inset: 0;
            background-image: url('{{ asset('uploads/profil/' . $profil->foto) }}');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
        "></div>
    @endif

    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge-hero">
                    <i class="bi bi-patch-check-fill me-1"></i>
                    Terakreditasi B
                </span>

                <h1 class="hero-title">
                    {{ $profil->nama_sekolah ?? 'Sekolah Kami' }}
                </h1>

                <p class="hero-subtitle">
                    {{ $profil->deskripsi
                        ? Str::limit($profil->deskripsi, 160)
                        : 'Membangun generasi berprestasi dan berkarakter melalui pendidikan berkualitas.' }}
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#profil" class="btn-hero-primary">
                        <i class="bi bi-info-circle me-2"></i>Kenali Sekolah
                    </a>
                    <a href="#berita" class="btn-hero-outline">
                        <i class="bi bi-newspaper me-2"></i>Berita Terbaru
                    </a>
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block text-center">
                @if(!empty($profil->logo))
                    <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                         alt="Logo"
                         style="max-width: 280px; opacity: 0.95;">
                @endif
            </div>
        </div>
    </div>

    {{-- Wave bottom --}}
    <svg viewBox="0 0 1440 80" style="position: absolute; bottom: -1px; left: 0; width: 100%; height: auto;">
        <path fill="#ffffff" d="M0,40 C320,100 480,0 720,40 C960,80 1120,0 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</section>

@push('styles')
<style>
    .badge-hero {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 20px;
    }
    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 20px;
    }
    .hero-subtitle {
        font-size: 1.05rem;
        opacity: 0.9;
        line-height: 1.7;
        max-width: 560px;
    }
    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        background: #fff;
        color: var(--primary);
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    .btn-hero-primary:hover {
        background: var(--accent);
        color: var(--dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .btn-hero-outline {
        display: inline-flex;
        align-items: center;
        background: transparent;
        color: #fff;
        border: 1.5px solid rgba(255,255,255,0.4);
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    .btn-hero-outline:hover {
        background: rgba(255,255,255,0.1);
        border-color: #fff;
        color: #fff;
    }
    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-section { min-height: 480px !important; padding: 80px 0 60px !important; }
    }
</style>
@endpush