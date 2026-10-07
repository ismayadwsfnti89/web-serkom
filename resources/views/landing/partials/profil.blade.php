<section class="py-5 bg-light" id="profil">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Profil Sekolah</h2>
            <p class="text-muted">Mengenal lebih dekat sekolah kami</p>
        </div>

        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                @if($profil?->foto)
                    <img src="{{ asset('uploads/profil/' . $profil->foto) }}"
                         alt="{{ $profil->nama_sekolah }}"
                         class="img-fluid rounded-3 shadow-sm">
                @else
                    <div class="bg-secondary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                         style="height: 400px;">
                        <i class="bi bi-building text-secondary" style="font-size: 6rem;"></i>
                    </div>
                @endif
            </div>

            <div class="col-lg-6">
                <h3 class="fw-bold mb-3">{{ $profil?->nama_sekolah ?? 'Sekolah Kami' }}</h3>

                @if($profil?->deskripsi)
                    <p class="text-muted mb-4">{{ $profil->deskripsi }}</p>
                @endif

                <div class="row g-3 mb-4">
                    @if($profil?->npsn)
                        <div class="col-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body d-flex align-items-center gap-2">
                                    <i class="bi bi-hash text-danger fs-4"></i>
                                    <div>
                                        <small class="text-muted d-block">NPSN</small>
                                        <strong>{{ $profil->npsn }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($profil?->tahun_berdiri)
                        <div class="col-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body d-flex align-items-center gap-2">
                                    <i class="bi bi-calendar-check text-danger fs-4"></i>
                                    <div>
                                        <small class="text-muted d-block">Tahun Berdiri</small>
                                        <strong>{{ $profil->tahun_berdiri }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($profil?->kepala_sekolah)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body d-flex align-items-center gap-2">
                                    <i class="bi bi-person-badge text-danger fs-4"></i>
                                    <div>
                                        <small class="text-muted d-block">Kepala Sekolah</small>
                                        <strong>{{ $profil->kepala_sekolah }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if($profil?->visi_misi)
                    <div class="card bg-danger text-white border-0">
                        <div class="card-body">
                            <h6 class="fw-bold text-warning mb-2">
                                <i class="bi bi-bullseye me-1"></i> Visi & Misi
                            </h6>
                            <p class="mb-0 small" style="white-space: pre-line;">{{ $profil->visi_misi }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
