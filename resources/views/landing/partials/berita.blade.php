<section class="py-5 bg-light" id="berita">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Berita Terbaru</h2>
                <p class="text-muted mb-0">Kegiatan & kabar terbaru dari sekolah</p>
            </div>
            <a href="{{ route('tampil.berita') }}" class="btn btn-outline-danger btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($berita as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}"
                                 class="card-img-top" alt="{{ $item->judul }}"
                                 style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
                                 style="height: 180px;">
                                <i class="bi bi-newspaper text-secondary" style="font-size: 3rem;"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}
                            </small>
                            <h6 class="fw-bold mt-2">{{ $item->judul }}</h6>
                            <p class="text-muted small mb-3">
                                {{ Str::limit(strip_tags($item->isi), 90) }}
                            </p>
                            <a href="{{ route('tampil.berita.detail', $item->id_berita) }}" class="text-danger small text-decoration-none">
                                Baca <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">Belum ada berita untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>