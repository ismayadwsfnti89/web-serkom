<section class="py-5" id="galeri">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Galeri Sekolah</h2>
                <p class="text-muted mb-0">Potret kegiatan seru di sekolah kami</p>
            </div>
            <a href="#" class="btn btn-outline-danger btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-3">
            @forelse($galeri as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="ratio ratio-1x1">
                            @if($item->kategori === 'Foto')
                                <img src="{{ asset('uploads/galeri/' . $item->file) }}"
                                     alt="{{ $item->judul }}" class="object-fit-cover">
                            @else
                                <div class="bg-danger d-flex align-items-center justify-content-center">
                                    <i class="bi bi-play-circle-fill text-white" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="fw-semibold">{{ Str::limit($item->judul, 30) }}</small>
                        </div>
                    </div>
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
