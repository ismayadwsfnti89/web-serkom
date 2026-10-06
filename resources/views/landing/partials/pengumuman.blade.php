<section class="section" id="pengumuman">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Info</span>
                <h2 class="section-title">Pengumuman</h2>
                <p class="section-subtitle">Informasi penting dari sekolah</p>
            </div>
        </div>

        <div class="row g-3">
            @forelse($pengumuman as $item)
                <div class="col-md-4 fade-in-up">
                    <div class="pengumuman-card">
                        <div class="pengumuman-date">
                            <span class="date-day">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                            </span>
                            <span class="date-month">
                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('M Y') }}
                            </span>
                        </div>
                        <div class="pengumuman-body">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 fade-in-up">
                    <i class="bi bi-megaphone" style="font-size: 4rem; color: var(--gray); opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .pengumuman-card {
        display: flex;
        gap: 20px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        transition: all 0.3s;
    }
    .pengumuman-card:hover {
        border-color: var(--primary);
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(164,22,26,0.08);
    }
    .pengumuman-date {
        flex-shrink: 0;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: #fff;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }
    .date-day {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
    }
    .date-month {
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 2px;
    }
    .pengumuman-body h5 {
        font-size: 0.95rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--dark);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .pengumuman-body p {
        font-size: 0.8rem;
        color: var(--gray);
        line-height: 1.6;
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush