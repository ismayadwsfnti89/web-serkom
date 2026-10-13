<section class="py-5" id="galeri" data-aos="fade-up">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Galeri Sekolah</h2>
                <p class="text-muted mb-0">Potret kegiatan seru di sekolah kami</p>
            </div>
            <a href="{{ route('tampil.galeri') }}" class="btn btn-outline-danger btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-3">
            @forelse($galeri as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <x-galeri-card :item="$item" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">Belum ada galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
