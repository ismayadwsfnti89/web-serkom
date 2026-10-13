<section class="py-5" id="siswa" data-aos="fade-up">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Data Siswa</h2>
                <p class="text-muted mb-0">Siswa-siswi aktif sekolah kami</p>
            </div>
            <a href="{{ route('tampil.siswa') }}" class="btn btn-outline-danger btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-3">
            @forelse($siswa as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="ratio ratio-1x1">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_siswa) }}&background=0284c7&color=fff&size=200"
                                 alt="{{ $item->nama_siswa }}"
                                 class="object-fit-cover">
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-1">{{ $item->nama_siswa }}</h6>
                            <small class="text-muted d-block mb-2">NISN: {{ $item->nisn }}</small>
                            <span class="badge {{ $item->jenis_kelamin === 'Laki-Laki' ? 'bg-primary' : 'bg-danger' }}">
                                {{ $item->jenis_kelamin }}
                            </span>
                            @if($item->tahun_masuk)
                                <small class="text-muted d-block mt-2">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $item->tahun_masuk }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-people text-muted" style="font-size:4rem;"></i>
                    <p class="text-muted mt-3">Belum ada data siswa.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>