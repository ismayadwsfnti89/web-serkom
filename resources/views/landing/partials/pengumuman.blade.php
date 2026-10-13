<section class="py-5 bg-light" id="pengumuman" data-aos="fade-up">
    <div class="container">

        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Pengumuman</h2>
                <p class="text-muted mb-0">Informasi penting dari sekolah</p>
            </div>
            <a href="{{ route('tampil.pengumuman') }}" class="btn btn-outline-danger btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-3">
            @forelse($pengumuman as $item)
                <div class="col-md-4">
                    <a href="{{ route('tampil.pengumuman.detail', $item->id_pengumuman) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body d-flex gap-3">

                                <div class="bg-danger text-white rounded-3 text-center p-2 flex-shrink-0" style="width:60px;">
                                    <div class="fw-bold fs-5 lh-1">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                                    </div>
                                    <small class="text-uppercase d-block mt-1" style="font-size:.65rem;">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('M Y') }}
                                    </small>
                                </div>

                                <div class="flex-grow-1" style="min-width:0;">
                                    <h6 class="fw-bold mb-1 text-dark">{{ $item->judul }}</h6>
                                    <p class="text-muted small mb-0 teks-pengumuman">
                                        {{ strip_tags($item->isi) }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-megaphone text-muted" style="font-size:4rem;"></i>
                    <p class="text-muted mt-3">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>

    </div>

    @push('styles')
    <style>
        .teks-pengumuman {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-word;
            overflow-wrap: anywhere;
        }
    </style>
    @endpush
</section>
