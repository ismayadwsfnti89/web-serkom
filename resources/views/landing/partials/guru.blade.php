<section class="section" id="guru" style="background: var(--gray-light);">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Tim Pengajar</span>
                <h2 class="section-title">Guru & Staf</h2>
                <p class="section-subtitle">Tenaga pendidik profesional kami</p>
            </div>
            @if(\App\Models\Guru::count() > 8)
                <a href="{{ route('guru.index') }}" class="section-link">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            @endif
        </div>

        <div class="row g-3 g-md-4">
            @forelse($guru as $item)
                <div class="col-6 col-md-4 col-lg-3 fade-in-up">
                    <div class="guru-card">
                        {{-- Foto --}}
                        <div class="guru-photo">
                            @if($item->foto)
                                <img src="{{ asset('uploads/guru/' . $item->foto) }}"
                                     alt="{{ $item->nama_guru }}"
                                     loading="lazy">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_guru) }}&background=a4161a&color=fff&size=200&bold=true"
                                     alt="{{ $item->nama_guru }}">
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="guru-info">
                            <h5>{{ $item->nama_guru }}</h5>
                            <p class="guru-jabatan">
                                {{ $item->jabatan ?? 'Guru' }}
                            </p>
                            @if($item->mapel)
                                <span class="guru-mapel">{{ $item->mapel }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 fade-in-up">
                    <i class="bi bi-people" style="font-size: 4rem; color: var(--gray); opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada data guru.</p>
                </div>
            @endforelse
        </div>

        {{-- Tombol Lihat Semua (mobile) --}}
        @if(\App\Models\Guru::count() > 8)
            <div class="text-center mt-4 d-md-none">
                <a href="{{ route('guru.index') }}" class="btn-hero-primary" style="background: var(--primary); color: #fff;">
                    Lihat Semua Guru <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        @endif
    </div>
</section>

@push('styles')
<style>
    .guru-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        text-align: center;
        height: 100%;
        transition: all 0.3s;
    }
    .guru-card:hover {
        transform: translateY(-6px);
        border-color: var(--primary);
        box-shadow: 0 20px 40px rgba(164, 22, 26, 0.12);
    }

    /* Foto */
    .guru-photo {
        width: 100%;
        aspect-ratio: 1;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
        position: relative;
    }
    .guru-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .guru-card:hover .guru-photo img {
        transform: scale(1.08);
    }

    /* Info */
    .guru-info {
        padding: 16px 12px 20px;
    }
    .guru-info h5 {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 6px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .guru-jabatan {
        font-size: 0.75rem;
        color: var(--gray);
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .guru-mapel {
        display: inline-block;
        background: var(--accent-light);
        color: var(--accent-dark);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
</style>
@endpush