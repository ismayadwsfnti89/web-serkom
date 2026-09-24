{{-- Sidebar --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <h5>
            <i class="bi bi-mortarboard-fill me-2"></i>
            Web Sekolah
        </h5>
    </div>

    <nav class="sidebar-nav">
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
                    <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}"
                       href="{{ route('siswa.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}"
                       href="{{ route('guru.index') }}">
                        <i class="bi bi-person-badge"></i>
                        <span>Guru</span>
                    </a>
                </li>
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
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}"
                       href="{{ route('galeri.index') }}">
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Informasi</div>
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
                    <a class="nav-link {{ request()->routeIs('profil.*') ? 'active' : '' }}"
                       href="{{ route('profil.edit') }}">
                        <i class="bi bi-building"></i>
                        <span>Profil Sekolah</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Lainnya</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing') }}" target="_blank">
                        <i class="bi bi-globe"></i>
                        <span>Lihat Web</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
