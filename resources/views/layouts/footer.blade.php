{{-- Footer --}}
<footer class="dashboard-footer">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 small">
                    &copy; {{ date('Y') }}
                    <span class="fw-semibold text-dark">{{ $profil->nama_sekolah ?? 'Web Sekolah' }}</span>
                    — All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 small">
                    Built with <i class="bi bi-heart-fill" style="color: var(--primary);"></i>
                    by IT Team
                </p>
            </div>
        </div>
    </div>
</footer>