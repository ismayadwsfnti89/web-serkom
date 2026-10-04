{{-- Sidebar --}}
<aside class="sidebar" id="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        @if(!empty($profil->logo))
            <img src="{{ asset('uploads/profil/' . $profil->logo) }}" alt="Logo">
        @else
            <i class="bi bi-mortarboard-fill"></i>
        @endif
        <div>
            <h5>{{ $profil->nama_sekolah ?? 'Web Sekolah' }}</h5>
            <small>Panel Admin</small>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">

        {{-- ===== MENU UTAMA ===== --}}
        <div class="menu-section">
            <div class="menu-section-title">Menu Utama</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ url('/') }}" target="_blank">
                        <i class="bi bi-globe2"></i>
                        <span>Lihat Website</span>
                        <i class="bi bi-box-arrow-up-right ms-auto small"></i>
                    </a>
                </li>
            </ul>
        </div>

        {{-- ===== DATA MASTER ===== --}}
        <div class="menu-section">
            <div class="menu-section-title">Data Master</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}"
                       href="{{ route('siswa.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}"
                       href="{{ route('guru.index') }}">
                        <i class="bi bi-person-badge"></i>
                        <span>Data Guru</span>
                    </a>
                </li>
                @if(Auth::check() && Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
                       href="{{ route('user.index') }}">
                        <i class="bi bi-person-gear"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>

        {{-- ===== KEGIATAN & PRESTASI ===== --}}
        <div class="menu-section">
            <div class="menu-section-title">Kegiatan & Prestasi</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ekskul.*') ? 'active' : '' }}"
                       href="{{ route('ekskul.index') }}">
                        <i class="bi bi-trophy"></i>
                        <span>Ekstrakurikuler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('prestasi.*') ? 'active' : '' }}"
                       href="{{ route('prestasi.index') }}">
                        <i class="bi bi-award"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- ===== KONTEN ===== --}}
        <div class="menu-section">
            <div class="menu-section-title">Konten</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                       href="{{ route('berita.index') }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}"
                       href="{{ route('pengumuman.index') }}">
                        <i class="bi bi-megaphone"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}"
                       href="{{ route('galeri.index') }}">
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- ===== PENGATURAN ===== --}}
        <div class="menu-section">
            <div class="menu-section-title">Pengaturan</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profil.*') ? 'active' : '' }}"
                       href="{{ route('profil.edit') }}">
                        <i class="bi bi-building"></i>
                        <span>Profil Sekolah</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</aside>