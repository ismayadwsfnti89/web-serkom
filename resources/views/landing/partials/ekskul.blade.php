<section class="py-5 bg-light" id="ekskul" data-aos="fade-up">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Ekstrakurikuler</h2>
                <p class="text-muted mb-0">Wadah pengembangan bakat & minat siswa</p>
            </div>
            <a href="{{ route('tampil.ekskul') }}" class="btn btn-outline-danger btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($ekskul as $item)
                <div class="col-6 col-md-4">
                    <a href="{{ route('tampil.ekskul.detail', $item->slug) }}" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm h-100">
                            @if($item->gambar)
                                <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}"
                                     class="card-img-top" alt="{{ $item->nama_ekskul }}"
                                     style="height: 180px; object-fit: cover;">
                            @else
                                <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
                                     style="height: 180px;">
                                    <i class="bi bi-trophy text-secondary" style="font-size: 3rem;"></i>
                                </div>
                            @endif

                            <div class="card-body text-center">
                                <h6 class="fw-bold mb-2">{{ $item->nama_ekskul }}</h6>
                                @if($item->pembina)
                                    <small class="text-muted d-block">
                                        <i class="bi bi-person-fill me-1"></i>{{ $item->pembina }}
                                    </small>
                                @endif
                                @if($item->jadwal_latihan)
                                    <small class="text-muted d-block">
                                        <i class="bi bi-clock-fill me-1"></i>{{ $item->jadwal_latihan }}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-trophy text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">Belum ada data ekstrakurikuler.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
