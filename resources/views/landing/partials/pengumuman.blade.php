<section class="py-5 bg-light" id="pengumuman" data-aos="fade-up">
    <div class="container">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Pengumuman</h2>
                    <p class="text-muted mb-0">Informasi penting dari sekolah</p>
                </div>
                <a href="{{ route('tampil.pengumuman') }}" class="btn btn-outline-danger btn-sm">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-3">
            @forelse($pengumuman as $item)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex gap-3">
                            <div class="bg-danger text-white rounded-3 text-center p-2"
                                 style="min-width: 60px;">
                                <div class="fw-bold fs-4">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</div>
                                <small class="text-uppercase" style="font-size: 0.7rem;">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('M Y') }}
                                </small>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ $item->judul }}</h6>
                                <p class="text-muted small mb-0">
                                    {{ Str::limit(strip_tags($item->isi), 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-megaphone text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
