{{-- Header --}}
<nav class="navbar top-navbar d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="d-none d-lg-block">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                @hasSection('breadcrumb')
                    @yield('breadcrumb')
                @else
                    <li class="breadcrumb-item active">@yield('title', 'Dashboard')</li>
                @endif
            </ol>
        </nav>

        {{-- Logo mobile --}}
        <div class="navbar-brand d-lg-none fw-bold me-auto">Web Sekolah</div>

        <div class="flex-grow-1 d-none d-lg-block"></div>

        {{-- Right Actions --}}
        <div class="d-flex align-items-center gap-2">

            {{-- Search --}}
            <button class="btn btn-light btn-sm" type="button">
                <i class="bi bi-search"></i>
            </button>

            {{-- Notifications --}}
            <div class="dropdown">
                <button class="btn btn-light btn-sm position-relative" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">3</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="width: 320px;">
                    <li class="dropdown-header">Notifikasi</li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Belum ada notifikasi</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-light btn-sm d-flex align-items-center" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama ?? 'Admin' }}&background=6366f1&color=fff&size=32"
                        alt="User"
                        class="rounded-circle me-2"
                        width="32"
                        height="32">
                    <span class="d-none d-md-inline">{{ Auth::user()->nama ?? 'Admin' }}</span>
                    <i class="bi bi-chevron-down ms-1"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    {{-- Info User --}}
                    <li class="px-3 py-2 border-bottom">
                        <div class="fw-semibold">{{ Auth::user()->nama ?? 'Admin' }}</div>
                        <small class="text-muted">{{ Auth::user()->role ?? 'Admin' }}</small>
                    </li>

                    {{-- Menu --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('profil.edit') }}">
                            <i class="bi bi-building me-2"></i>Profil Sekolah
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person me-2"></i>Profil Saya
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear me-2"></i>Pengaturan
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
