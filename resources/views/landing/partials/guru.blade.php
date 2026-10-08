<section class="py-5" id="guru">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Guru & Staf</h2>
                <p class="text-muted mb-0">Tenaga pendidik profesional kami</p>
            </div>
            @if($totalGuru > 8)
                <a href="{{ route('tampil.guru') }}" class="btn btn-outline-danger btn-sm">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            @endif
        </div>

        <div class="row g-3">
            @forelse($guru as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="ratio ratio-1x1">
                            @if($item->foto)
                                <img src="{{ asset('uploads/guru/' . $item->foto) }}"
                                     alt="{{ $item->nama_guru }}"
                                     class="object-fit-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_guru) }}&background=a16207&color=fff&size=200"
                                     alt="{{ $item->nama_guru }}">
                            @endif
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-1">{{ $item->nama_guru }}</h6>
                            <small class="text-muted d-block">{{ $item->jabatan ?? 'Guru' }}</small>
                            @if($item->mapel)
                                <span class="badge bg-warning text-dark mt-2">{{ $item->mapel }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">Belum ada data guru.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>