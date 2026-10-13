<section class="py-5" id="prestasi" data-aos="fade-up">
    <div class="container">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Prestasi Terbaru</h2>
                    <p class="text-muted mb-0">Kebanggaan sekolah kami</p>
                </div>
                <a href="{{ route('tampil.prestasi') }}" class="btn btn-outline-danger btn-sm">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>


        <div class="row g-4">
            @forelse($prestasi as $item)
                @php
                    $warna = match($item->tingkat) {
                        'Internasional' => 'bg-primary',
                        'Nasional'      => 'bg-danger',
                        'Provinsi'      => 'bg-warning text-dark',
                        default         => 'bg-secondary',
                    };
                @endphp

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        @if($item->foto)
                            <img src="{{ asset('uploads/prestasi/' . $item->foto) }}"
                                 class="card-img-top" alt="{{ $item->nama_prestasi }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
                                 style="height: 200px;">
                                <i class="bi bi-trophy text-secondary" style="font-size: 3rem;"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <span class="badge {{ $warna }} mb-2">{{ $item->tingkat }}</span>
                            <h6 class="fw-bold mb-1">{{ $item->nama_prestasi }}</h6>
                            @if($item->juara)
                                <small class="text-danger d-block">
                                    <i class="bi bi-award-fill me-1"></i>{{ $item->juara }}
                                </small>
                            @endif
                            @if($item->tahun)
                                <small class="text-muted">{{ $item->tahun }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-award text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">Belum ada data prestasi.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
