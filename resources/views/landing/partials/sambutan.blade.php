<section class="section" id="sambutan">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Sambutan</span>
                <h2 class="section-title">Kata Pengantar Kepala Sekolah</h2>
            </div>
        </div>

        <div class="sambutan-wrap fade-in-up">
            <div class="row align-items-center g-4 g-lg-5">

                {{-- Foto Kepsek --}}
                <div class="col-md-4 text-center">
                    <div class="sambutan-photo-wrap">
                        @if(!empty($profil->foto))
                            {{-- Kalau ada foto sekolah, gak pakai --}}
                        @endif
                        <div class="sambutan-photo">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="sambutan-quote-badge">
                            <i class="bi bi-quote"></i>
                        </div>
                    </div>
                </div>

                {{-- Teks Sambutan --}}
                <div class="col-md-8">
                    <div class="sambutan-content">
                        <p class="sambutan-text">
                            Assalamu'alaikum warahmatullahi wabarakatuh.
                        </p>
                        <p class="sambutan-text">
                            Selamat datang di website resmi <strong>{{ $profil->nama_sekolah ?? 'sekolah kami' }}</strong>.
                            Website ini kami hadirkan sebagai media informasi, komunikasi, dan
                            dokumentasi kegiatan sekolah untuk siswa, orang tua, dan masyarakat luas.
                        </p>
                        <p class="sambutan-text">
                            Kami berkomitmen untuk terus meningkatkan kualitas pendidikan
                            dan membentuk generasi yang <strong>cerdas, berkarakter, dan berakhlak mulia</strong>.
                            Semoga website ini bermanfaat bagi kita semua.
                        </p>
                        <p class="sambutan-text">
                            Wassalamu'alaikum warahmatullahi wabarakatuh.
                        </p>

                        {{-- Nama Kepsek --}}
                        <div class="sambutan-signature">
                            <div class="signature-line"></div>
                            <strong>{{ $profil->kepala_sekolah ?? 'Kepala Sekolah' }}</strong>
                            <span>Kepala {{ $profil->nama_sekolah ?? 'Sekolah' }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .sambutan-wrap {
        background: #fff;
        border-radius: 20px;
        padding: 48px;
        border: 1px solid var(--border);
        position: relative;
        overflow: hidden;
    }
    .sambutan-wrap::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 200px; height: 200px;
        background: var(--accent-light);
        border-radius: 50%;
        opacity: 0.5;
    }

    /* Foto Kepsek */
    .sambutan-photo-wrap {
        position: relative;
        display: inline-block;
    }
    .sambutan-photo {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.7);
        font-size: 6rem;
        box-shadow: 0 20px 50px rgba(164, 22, 26, 0.25);
        border: 6px solid #fff;
        position: relative;
        z-index: 1;
    }
    .sambutan-quote-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 48px;
        height: 48px;
        background: var(--accent);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.5rem;
        border: 4px solid #fff;
        z-index: 2;
        box-shadow: 0 6px 20px rgba(212, 160, 23, 0.3);
    }

    /* Teks Sambutan */
    .sambutan-content {
        position: relative;
        z-index: 1;
    }
    .sambutan-text {
        font-size: 0.95rem;
        line-height: 1.9;
        color: #4b5563;
        margin-bottom: 16px;
    }
    .sambutan-text strong {
        color: var(--primary);
        font-weight: 700;
    }

    /* Tanda Tangan */
    .sambutan-signature {
        margin-top: 28px;
        padding-top: 20px;
    }
    .signature-line {
        width: 60px;
        height: 3px;
        background: var(--accent);
        margin-bottom: 16px;
        border-radius: 2px;
    }
    .sambutan-signature strong {
        display: block;
        color: var(--dark);
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 4px;
    }
    .sambutan-signature span {
        color: var(--gray);
        font-size: 0.85rem;
    }

    /* Responsive */
    @media (max-width: 767.98px) {
        .sambutan-wrap { padding: 28px 20px; }
        .sambutan-photo {
            width: 140px;
            height: 140px;
            font-size: 4rem;
        }
        .sambutan-quote-badge {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
    }
</style>
@endpush