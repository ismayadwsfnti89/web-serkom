<nav class="navbar top-navbar d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center">

        <button class="btn btn-light btn-sm d-lg-none me-2" type="button" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>

        <nav aria-label="breadcrumb" class="d-none d-lg-block">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" class="text-danger text-decoration-none">
                        <i class="bi bi-house-door me-1"></i>Home
                    </a>
                </li>
                @hasSection('breadcrumb')
                    @yield('breadcrumb')
                @else
                    <li class="breadcrumb-item active">@yield('title', 'Dashboard')</li>
                @endif
            </ol>
        </nav>

        <div class="navbar-brand d-lg-none fw-bold me-auto d-flex align-items-center gap-2">
            @if($profil?->logo)
                <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                     alt="Logo"
                     style="width: 28px; height: 28px; object-fit: contain;">
            @endif
            <span>{{ $profil?->nama_sekolah ?? 'Web Sekolah' }}</span>
        </div>

        <div class="grow d-none d-lg-block"></div>

        <div class="d-flex align-items-center gap-2">

            <a href="{{ route('landing.index') }}"
               class="btn btn-light btn-sm d-none d-md-inline-flex align-items-center">
                <i class="bi bi-globe2 me-1"></i>
                <span class="d-none d-lg-inline">Lihat Website</span>
            </a>

            <div class="dropdown">
                <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="width: 300px;">
                    <li class="dropdown-header">Notifikasi</li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="text-center py-4 text-muted small">
                        <i class="bi bi-bell-slash fs-4 d-block mb-2"></i>
                        Belum ada notifikasi
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-light btn-sm d-flex align-items-center" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama ?? 'Admin' }}&background=047857&color=fff&size=32"
                         alt="User"
                         class="rounded-circle me-2"
                         width="32" height="32">
                    <span class="d-none d-md-inline">{{ Auth::user()->nama ?? 'Admin' }}</span>
                    <i class="bi bi-chevron-down ms-1"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="px-3 py-2 border-bottom">
                        <div class="fw-semibold">{{ Auth::user()->nama ?? 'Admin' }}</div>
                        <small class="text-muted text-capitalize">{{ Auth::user()->role ?? 'Admin' }}</small>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profil.saya') }}">
                            <i class="bi bi-person-circle me-2"></i>Profil Saya
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profil.edit') }}">
                            <i class="bi bi-building me-2"></i>Profil Sekolah
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>