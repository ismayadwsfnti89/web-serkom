<section class="section" id="galeri" style="background: var(--gray-light);">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Momen</span>
                <h2 class="section-title">Galeri Sekolah</h2>
                <p class="section-subtitle">Potret kegiatan seru di sekolah kami</p>
            </div>
            <a href="#" class="section-link">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-3 justify-content-center">
            @forelse($galeri as $item)
                <div class="col-6 col-md-4 col-lg-3 fade-in-up">
                    <div class="galeri-item">
                        @if($item->kategori === 'Foto')
                            <img src="{{ asset('uploads/galeri/' . $item->file) }}"
                                 alt="{{ $item->judul }}" loading="lazy">
                        @else
                            <div class="galeri-video">
                                <i class="bi bi-play-circle-fill"></i>
                            </div>
                        @endif
                        <div class="galeri-overlay">
                            <p>{{ $item->judul }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images" style="font-size: 4rem; color: var(--gray); opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .galeri-item {
        position: relative;
        aspect-ratio: 1;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .galeri-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }
    .galeri-item img,
    .galeri-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .galeri-video {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #fff;
    }
    .galeri-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(106, 12, 15, 0.9) 0%, transparent 60%);
        display: flex;
        align-items: flex-end;
        padding: 16px;
        opacity: 0;
        transition: opacity 0.3s;
    }
    .galeri-item:hover .galeri-overlay { opacity: 1; }
    .galeri-overlay p {
        color: #fff;
        font-weight: 600;
        font-size: 0.85rem;
        margin: 0;
        line-height: 1.3;
    }
</style>
@endpush