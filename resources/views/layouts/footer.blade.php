<footer class="dashboard-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 small">
                    &copy; {{ date('Y') }}
                    <strong>{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</strong>
                    — All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
