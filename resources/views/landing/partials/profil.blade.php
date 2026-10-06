<section class="section" id="profil" style="background: var(--gray-light);">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Tentang Kami</span>
                <h2 class="section-title">Profil Sekolah</h2>
                <p class="section-subtitle">Mengenal lebih dekat sekolah kami</p>
            </div>
        </div>

        <div class="row align-items-center g-5">
            {{-- Foto Sekolah --}}
            <div class="col-lg-6 fade-in-up">
                @if(!empty($profil->foto))
                    <img src="{{ asset('uploads/profil/' . $profil->foto) }}"
                         alt="{{ $profil->nama_sekolah }}"
                         class="profil-image">
                @else
                    <div class="profil-placeholder">
                        <i class="bi bi-building"></i>
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <div class="col-lg-6 fade-in-up">
                <h3 class="mb-3" style="font-weight: 800;">
                    {{ $profil->nama_sekolah ?? 'Sekolah Kami' }}
                </h3>

                @if(!empty($profil->deskripsi))
                    <p class="text-muted" style="line-height: 1.9; margin-bottom: 24px;">
                        {{ $profil->deskripsi }}
                    </p>
                @endif

                {{-- Info Grid --}}
                <div class="row g-3 mb-4">
                    @if(!empty($profil->npsn))
                        <div class="col-6">
                            <div class="info-box">
                                <i class="bi bi-hash"></i>
                                <div>
                                    <small>NPSN</small>
                                    <strong>{{ $profil->npsn }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($profil->tahun_berdiri))
                        <div class="col-6">
                            <div class="info-box">
                                <i class="bi bi-calendar-check"></i>
                                <div>
                                    <small>Tahun Berdiri</small>
                                    <strong>{{ $profil->tahun_berdiri }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($profil->kepala_sekolah))
                        <div class="col-12">
                            <div class="info-box">
                                <i class="bi bi-person-badge"></i>
                                <div>
                                    <small>Kepala Sekolah</small>
                                    <strong>{{ $profil->kepala_sekolah }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Visi Misi --}}
                @if(!empty($profil->visi_misi))
                    <div class="visi-misi-box">
                        <div class="visi-misi-label">
                            <i class="bi bi-bullseye me-2"></i>Visi & Misi
                        </div>
                        <div class="visi-misi-content">{{ $profil->visi_misi }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .profil-image {
        width: 100%;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    }
    .profil-placeholder {
        background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
        border-radius: 16px;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 6rem;
        color: var(--primary);
        opacity: 0.4;
    }
    .info-box {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.2s;
    }
    .info-box:hover {
        border-color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(164,22,26,0.08);
    }
    .info-box i {
        color: var(--primary);
        font-size: 1.4rem;
    }
    .info-box small {
        display: block;
        color: var(--gray);
        font-size: 0.7rem;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .info-box strong {
        color: var(--dark);
        font-size: 0.95rem;
        font-weight: 700;
    }
    .visi-misi-box {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: #fff;
        padding: 24px;
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }
    .visi-misi-box::before {
        content: '';
        position: absolute;
        top: -50%; right: -20%;
        width: 200px; height: 200px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .visi-misi-label {
        font-weight: 700;
        margin-bottom: 12px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--accent);
    }
    .visi-misi-content {
        font-size: 0.9rem;
        line-height: 1.8;
        white-space: pre-line;
        position: relative;
    }
</style>
@endpush