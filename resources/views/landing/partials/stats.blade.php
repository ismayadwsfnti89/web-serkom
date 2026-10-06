<section class="section" style="padding: 40px 0;">
    <div class="container">
        <div class="row g-4">
            {{-- Siswa --}}
            <div class="col-6 col-lg-3 fade-in-up">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--primary-light); color: var(--primary);">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-number" data-count="{{ $totalSiswa }}">0</div>
                    <div class="stat-label">Siswa Aktif</div>
                </div>
            </div>

            {{-- Guru --}}
            <div class="col-6 col-lg-3 fade-in-up">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--accent-light); color: var(--accent-dark);">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div class="stat-number" data-count="{{ $totalGuru }}">0</div>
                    <div class="stat-label">Guru & Staf</div>
                </div>
            </div>

            {{-- Ekskul --}}
            <div class="col-6 col-lg-3 fade-in-up">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--primary-light); color: var(--primary);">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <div class="stat-number" data-count="{{ $totalEkskul }}">0</div>
                    <div class="stat-label">Ekstrakurikuler</div>
                </div>
            </div>

            {{-- Prestasi --}}
            <div class="col-6 col-lg-3 fade-in-up">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--accent-light); color: var(--accent-dark);">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="stat-number" data-count="{{ $totalPrestasi }}">0</div>
                    <div class="stat-label">Prestasi Diraih</div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .stat-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 28px 20px;
        text-align: center;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .stat-card:hover::before { transform: scaleX(1); }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        border-color: transparent;
    }
    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 16px;
    }
    .stat-number {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1;
        margin-bottom: 6px;
    }
    .stat-label {
        color: var(--gray);
        font-size: 0.85rem;
        font-weight: 500;
    }
</style>
@endpush

@push('scripts')
<script>
    // Number counter
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.stat-number');
        const speed = 50;

        const animateCount = (el) => {
            const target = parseInt(el.dataset.count) || 0;
            const step = Math.ceil(target / speed);
            let current = 0;
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    el.textContent = target;
                    clearInterval(timer);
                } else {
                    el.textContent = current;
                }
            }, 20);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    });
</script>
@endpush