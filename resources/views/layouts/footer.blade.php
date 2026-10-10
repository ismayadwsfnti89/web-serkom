<footer class="bg-dark text-secondary pt-5" id="kontak">
    <div class="container">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-lg-6 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    @if($profil?->logo)
                        <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                             alt="Logo" width="40" height="40" style="object-fit: contain;">
                    @else
                        <span class="badge bg-danger p-2 rounded-3">
                            <i class="bi bi-mortarboard-fill fs-5"></i>
                        </span>
                    @endif
                    <h5 class="text-white mb-0">{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</h5>
                </div>
                @if($profil?->deskripsi)
                    <p class="small">{{ Str::limit($profil->deskripsi, 200) }}</p>
                @endif
            </div>

            {{-- Kontak --}}
            <div class="col-lg-6 col-md-6">
                <h5 class="text-white mb-3">Kontak</h5>
                <ul class="list-unstyled small">
                    @if($profil?->alamat)
                        <li class="mb-2">
                            <i class="bi bi-geo-alt-fill text-warning me-2"></i>{{ $profil->alamat }}
                        </li>
                    @endif
                    @if($profil?->kontak)
                        <li class="mb-2">
                            <i class="bi bi-telephone-fill text-warning me-2"></i>{{ $profil->kontak }}
                        </li>
                    @endif
                    @if($profil?->npsn)
                        <li class="mb-2">
                            <i class="bi bi-hash text-warning me-2"></i>NPSN: {{ $profil->npsn }}
                        </li>
                    @endif
                </ul>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="text-center small pb-4">
            &copy; {{ date('Y') }} {{ $profil?->nama_sekolah ?? 'Web Sekolah' }}. All rights reserved.
        </div>
    </div>
</footer>
