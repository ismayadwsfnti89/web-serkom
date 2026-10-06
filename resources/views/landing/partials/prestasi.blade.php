<section class="section" id="prestasi">
    <div class="container">
        <div class="section-header-flex fade-in-up">
            <div>
                <span class="section-label">Pencapaian</span>
                <h2 class="section-title">Prestasi Terbaru</h2>
                <p class="section-subtitle">Kebanggaan sekolah kami</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse($prestasi as $item)
                <div class="col-md-6 col-lg-3 fade-in-up">
                    <div class="prestasi-card">
                        <div class="prestasi-badge">
                            @php
                                $warna = match($item->tingkat) {
                                    'Internasional' => ['bg' => '#7c3aed', 'text' => '#fff'],
                                    'Nasional'      => ['bg' => 'var(--primary)', 'text' => '#fff'],
                                    'Provinsi'      => ['bg' => 'var(--accent)', 'text' => 'var(--dark)'],
                                    default         => ['bg' => '#e5e7eb', 'text' => 'var(--dark)'],
                                };
                            @endphp
                            <span style="background: {{ $warna['bg'] }}; color: {{ $warna['text'] }};">
                                {{ $item->tingkat }}
                            </span>
                        </div>

                        <div class="prestasi-img">
                            @if($item->foto)
                                <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="{{ $item->nama_prestasi }}">
                            @else
                                <div class="prestasi-placeholder">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>
                            @endif
                        </div>

                        <div class="prestasi-body">
                            <h5>{{ $item->nama_prestasi }}</h5>
                            @if($item->juara)
                                <p class="prestasi-juara">
                                    <i class="bi bi-award-fill me-1"></i>{{ $item->juara }}
                                </p>
                            @endif
                            @if($item->tahun)
                                <p class="prestasi-tahun">{{ $item->tahun }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 fade-in-up">
                    <i class="bi bi-award" style="font-size: 4rem; color: var(--gray); opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada data prestasi.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .prestasi-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        position: relative;
        transition: all 0.3s;
    }
    .prestasi-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        border-color: var(--primary);
    }
    .prestasi-badge {
        position: absolute;
        top: 16px; right: 16px;
        z-index: 2;
    }
    .prestasi-badge span {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .prestasi-img {
        width: 100%;
        aspect-ratio: 4/3;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 16px;
    }
    .prestasi-img img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .prestasi-card:hover .prestasi-img img { transform: scale(1.05); }
    .prestasi-placeholder {
        width: 100%; height: 100%;
        background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: var(--accent-dark);
    }
    .prestasi-body h5 {
        font-size: 0.95rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 8px;
        color: var(--dark);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .prestasi-juara {
        font-size: 0.8rem;
        color: var(--primary);
        font-weight: 600;
        margin-bottom: 4px;
    }
    .prestasi-tahun {
        font-size: 0.75rem;
        color: var(--gray);
        margin: 0;
    }
</style>
@endpush