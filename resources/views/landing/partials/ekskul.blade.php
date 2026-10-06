<section class="section" id="ekskul" style="background: var(--gray-light);">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Kegiatan</span>
                <h2 class="section-title">Ekstrakurikuler</h2>
                <p class="section-subtitle">Wadah pengembangan bakat & minat siswa</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse($ekskul as $item)
                <div class="col-6 col-md-4 fade-in-up">
                    <div class="ekskul-card">

                        {{-- FOTO --}}
                        <div class="ekskul-image">
                            @if($item->gambar)
                                <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}"
                                     alt="{{ $item->nama_ekskul }}"
                                     loading="lazy">
                            @else
                                <div class="ekskul-placeholder">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>
                            @endif
                        </div>

                        {{-- INFO --}}
                        <div class="ekskul-body">
                            <h5>{{ $item->nama_ekskul }}</h5>

                            @if($item->pembina)
                                <p class="ekskul-info">
                                    <i class="bi bi-person-fill"></i>
                                    <span>{{ $item->pembina }}</span>
                                </p>
                            @endif

                            @if($item->jadwal_latihan)
                                <p class="ekskul-info">
                                    <i class="bi bi-clock-fill"></i>
                                    <span>{{ $item->jadwal_latihan }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 fade-in-up">
                    <i class="bi bi-trophy" style="font-size: 4rem; color: var(--gray); opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada data ekstrakurikuler.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .ekskul-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
    }
    .ekskul-card:hover {
        transform: translateY(-6px);
        border-color: var(--accent);
        box-shadow: 0 20px 40px rgba(212,160,23,0.15);
    }
    .ekskul-image {
        width: 100%;
        aspect-ratio: 16/10;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
    }
    .ekskul-image img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .ekskul-card:hover .ekskul-image img { transform: scale(1.08); }
    .ekskul-placeholder {
        width: 100%; height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: var(--accent-dark);
        opacity: 0.6;
    }
    .ekskul-body {
        padding: 20px;
        text-align: center;
        flex: 1;
    }
    .ekskul-body h5 {
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--dark);
    }
    .ekskul-info {
        font-size: 0.8rem;
        color: var(--gray);
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    .ekskul-info i { color: var(--primary); }
</style>
@endpush