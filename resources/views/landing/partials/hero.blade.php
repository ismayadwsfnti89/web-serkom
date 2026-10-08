<section id="beranda" class="position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

        @if($galeriHero->count() > 1)
            <div class="carousel-indicators">
                @foreach($galeriHero as $i => $g)
                    <button type="button" data-bs-target="#heroCarousel"
                            data-bs-slide-to="{{ $i }}"
                            class="{{ $i == 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
        @endif

        <div class="carousel-inner">
            @forelse($galeriHero as $i => $g)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="hero-slide" style="
                        background-image: url('{{ asset('uploads/galeri/' . $g->file) }}');
                        background-size: cover;
                        background-position: center;
                        height: 520px;
                        position: relative;
                    ">
                        <div class="hero-overlay"></div>

                        {{-- Konten di dalam slide --}}
                        <div class="hero-content position-relative h-100 d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 text-white">
                                        <span class="badge bg-warning text-dark mb-3">
                                            <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi B
                                        </span>
                                        <h1 class="display-4 fw-bold mb-3">
                                            {{ $profil?->nama_sekolah ?? 'Sekolah Kami' }}
                                        </h1>
                                        <p class="lead mb-4">
                                            {{ Str::limit($profil?->deskripsi ?? 'Membangun generasi berprestasi dan berkarakter melalui pendidikan berkualitas.', 193) }}
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
                        </div>
                    </div>
                </div>
            @empty
                {{-- Fallback kalau galeri kosong --}}
                <div class="carousel-item active">
                    <div class="hero-slide" style="
                        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
                        height: 520px;
                        position: relative;
                    ">
                        <div class="hero-content position-relative h-100 d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 text-white">
                                        <span class="badge bg-warning text-dark mb-3">
                                            <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi B
                                        </span>
                                        <h1 class="display-4 fw-bold mb-3">
                                            {{ $profil?->nama_sekolah ?? 'Sekolah Kami' }}
                                        </h1>
                                        <p class="lead mb-4">
                                            {{ Str::limit($profil?->deskripsi ?? 'Membangun generasi berprestasi dan berkarakter melalui pendidikan berkualitas.', 2000) }}
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
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        @if($galeriHero->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        @endif
    </div>
</section>
