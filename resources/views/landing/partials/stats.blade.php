<section class="py-4 border-bottom">
    <div class="container">
        <div class="row g-4 text-center">

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-people-fill text-danger fs-1"></i>
                        <h3 class="fw-bold mt-2 mb-0">{{ $totalSiswa }}</h3>
                        <small class="text-muted">Siswa Aktif</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-person-badge-fill text-danger fs-1"></i>
                        <h3 class="fw-bold mt-2 mb-0">{{ $totalGuru }}</h3>
                        <small class="text-muted">Guru & Staf</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-trophy-fill text-danger fs-1"></i>
                        <h3 class="fw-bold mt-2 mb-0">{{ $totalEkskul }}</h3>
                        <small class="text-muted">Ekstrakurikuler</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-award-fill text-danger fs-1"></i>
                        <h3 class="fw-bold mt-2 mb-0">{{ $totalPrestasi }}</h3>
                        <small class="text-muted">Prestasi</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>