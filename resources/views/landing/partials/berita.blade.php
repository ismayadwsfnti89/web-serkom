<section class="section" id="berita">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Informasi</span>
                <h2 class="section-title">Berita Terbaru</h2>
                <p class="section-subtitle">Kegiatan & kabar terbaru dari sekolah</p>
            </div>
            <a href="#" class="section-link">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($berita as $item)
                <div class="col-md-6 col-lg-3 fade-in-up">
                    <article class="berita-card">
                        <div class="berita-image">
                            @if($item->gambar)
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                            @else
                                <div class="berita-placeholder">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                            @endif
                            <span class="berita-date-badge">
                                <i class="bi bi-calendar3"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}
                            </span>
                        </div>
                        <div class="berita-body">
                            <h5 class="berita-title">{{ $item->judul }}</h5>
                            <p class="berita-excerpt">{{ Str::limit(strip_tags($item->isi), 90) }}</p>
                            <a href="#" class="berita-link">
                                Baca <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5 fade-in-up">
                    <i class="bi bi-newspaper" style="font-size: 4rem; color: var(--gray); opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada berita untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .berita-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: all 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .berita-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .berita-image {
        position: relative;
        overflow: hidden;
        height: 180px;
    }
    .berita-image img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .berita-card:hover .berita-image img { transform: scale(1.08); }
    .berita-placeholder {
        height: 100%;
        background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: var(--primary);
        opacity: 0.5;
    }
    .berita-date-badge {
        position: absolute;
        bottom: 12px; left: 12px;
        background: var(--accent);
        color: var(--dark);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 700;
    }
    .berita-date-badge i { margin-right: 4px; }
    .berita-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .berita-title {
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 10px;
        color: var(--dark);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .berita-excerpt {
        font-size: 0.82rem;
        color: var(--gray);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 14px;
        flex: 1;
    }
    .berita-link {
        color: var(--primary);
        font-weight: 600;
        font-size: 0.82rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: gap 0.2s;
        align-self: flex-start;
    }
    .berita-link:hover { gap: 10px; color: var(--primary-dark); }
</style>
@endpush