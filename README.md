# Website Sekolah SDN 4 Manonjaya

Sistem informasi sekolah berbasis web yang dibangun dengan **Laravel 12**.
Project ini punya 2 bagian utama: **Landing Page** (publik) dan **Dashboard Admin** (internal).

---

## Fitur

### Landing Page (Publik — Tanpa Login)
- Hero carousel (gambar dari galeri)
- Statistik sekolah (jumlah siswa, guru, ekskul, prestasi)
- Profil sekolah (visi misi, NPSN, tahun berdiri, kepala sekolah)
- Preview guru & staf
- Berita terbaru
- Prestasi terbaru
- Galeri foto & video
- Ekstrakurikuler
- Pengumuman
- Halaman detail untuk setiap section

### Dashboard Admin & Operator
- Dashboard statistik
- Manajemen data siswa
- Manajemen data guru & staf (dengan upload foto)
- Manajemen user (khusus admin)
- Manajemen ekstrakurikuler
- Manajemen prestasi
- Manajemen galeri (foto & video YouTube)
- Manajemen berita
- Manajemen pengumuman
- Edit profil sekolah
- Edit profil sendiri (nama & password)

### Hak Akses (Role)
| Fitur | Admin | Operator |
|---|---|---|
| Dashboard | ✅ | ✅ |
| Profil Saya | ✅ | ✅ |
| Siswa (lihat & edit) | ✅ | ✅ |
| Siswa (tambah & hapus) | ✅ | ❌ |
| Guru (lihat & edit) | ✅ | ✅ |
| Guru (tambah & hapus) | ✅ | ❌ |
| Manajemen User | ✅ | ❌ |
| Ekstrakurikuler, Prestasi, Galeri, Berita, Pengumuman | ✅ | ✅ |
| Profil Sekolah | ✅ | ✅ |

---

## Teknologi

| Teknologi | Versi | Fungsi |
|---|---|---|
| Laravel | 12 | Framework PHP |
| PHP | 8.2 | Bahasa pemrograman |
| MySQL | - | Database |
| Bootstrap | 5.3 | Framework CSS |
| Bootstrap Icons | 1.13 | Icon |
| AOS | 2.3 | Animasi scroll |

---

## Struktur Folder
web-serkom/
├── app/
│ ├── Helpers/ # Fungsi bantuan (encrypt_id, dll)
│ ├── Http/
│ │ ├── Controllers/ # Logika aplikasi
│ │ └── Middleware/ # Satpam route (admin, operator)
│ └── Models/ # Model database
├── database/
│ ├── migrations/ # Struktur tabel
│ └── seeders/ # Data awal
├── public/
│ ├── css/ # Stylesheet custom
│ └── uploads/ # File yang diupload
├── resources/
│ └── views/ # Tampilan (blade)
│ ├── layouts/ # Kerangka halaman
│ ├── components/ # Komponen reusable
│ ├── landing/ # Halaman publik
│ ├── tampil/ # Halaman detail publik
│ ├── auth/ # Halaman login
│ └── [fitur]/ # CRUD tiap fitur
├── routes/
│ └── web.php # Daftar route
└── README.md

---
## Cara Install

### 1. Clone / Copy Project
Letakkan folder project di direktori lokal (misal `C:\web-serkom`).

### 2. Install Dependency
```bash
composer install
3. Setup Environment
Copy file .env.example menjadi .env:

bash
copy .env.example .env
Buka .env, atur koneksi database:

text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web-serkom
DB_USERNAME=root
DB_PASSWORD=
4. Generate Application Key
bash
php artisan key:generate
5. Buat Database
Buat database baru di MySQL dengan nama web-serkom.

6. Jalankan Migration & Seeder
bash
php artisan migrate
php artisan db:seed
7. Buat Folder Upload
Pastikan folder berikut ada di dalam public/uploads/:

text
uploads/
├── guru/
├── berita/
├── prestasi/
├── ekskul/
├── galeri/
└── profil/
Kalau belum ada, bikin manual.

8. Jalankan Server
bash
php artisan serve
Buka browser: http://127.0.0.1:8000

Akun Default
Dari file DatabaseSeeder.php:

Username	Password	Role
admin	password	Admin
operator	password	Operator
Catatan: Ganti password setelah login pertama.

Cara Pakai
Pengunjung (Tanpa Login)
Buka http://127.0.0.1:8000 → Landing page

Klik "Lihat Semua" di tiap section → halaman detail

Klik card galeri → lihat foto/video detail

Admin / Operator
Buka /login → masukkan username & password

Setelah login → masuk dashboard

Pilih menu di sidebar untuk kelola data

Klik ikon Logout di kanan atas untuk keluar

Library Pihak Ketiga
Semua library di bawah ini berlisensi MIT License:

Library	Lisensi
Laravel Framework	MIT License
Bootstrap 5	MIT License
Bootstrap Icons	MIT License
AOS (Animate on Scroll)	MIT License
Catatan lisensi: MIT License mengizinkan penggunaan gratis untuk keperluan pribadi maupun komersil, dengan syarat mencantumkan atribusi.

Keamanan
Password Hashing — password di-hash pakai bcrypt (Laravel default)

CSRF Protection — setiap form pakai @csrf token

Enkripsi ID di URL — ID di URL dienkripsi biar gak bisa ditebak

Middleware Role — cek role user sebelum akses fitur

Validasi Input — semua input dari user divalidasi

Kontributor
[Nama Kamu] — Pengembang utama

SDN 4 Manonjaya — Pemilik project

Lisensi
Project ini dibuat untuk keperluan internal sekolah.
© 2026 SDN 4 Manonjaya. All rights reserved.

<section id="beranda" class="position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

        @if($galeriHero->count() > 1)
            <div class="carousel-indicators">
                @foreach($galeriHero as $i => $g)
                    <button type="button" data-bs-target="#heroCarousel"
                            data-bs-slide-to="{{ $i }}"
                            class="{{ $i == 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
        @endif

        <div class="carousel-inner">
            @forelse($galeriHero as $i => $g)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="hero-slide" style="
                        background-image: url('{{ asset('uploads/galeri/' . $g->file) }}');
                        background-size: cover;
                        background-position: center;
                        height: 520px;
                        position: relative;
                    ">
                        <div class="hero-overlay"></div>

                        <div class="hero-content position-relative h-100 d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 text-white">
                                        <span class="badge bg-warning text-dark mb-3">
                                            <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi B
                                        </span>
                                        <h1 class="display-4 fw-bold mb-3">
                                            {{ $profil?->nama_sekolah ?? 'Sekolah Kami' }}
                                        </h1>
                                        <p class="lead mb-4">
                                            {{ Str::limit($profil?->deskripsi ?? 'Membangun generasi berprestasi dan berkarakter melalui pendidikan berkualitas.', 150) }}
                                        </p>
                                    </div>

                                    @if($profil?->logo)
                                        <div class="col-lg-5 d-none d-lg-block text-center">
                                            <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                                                 alt="Logo"
                                                 class="img-fluid" style="max-height: 280px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="carousel-item active">
                    <div class="hero-slide" style="
                        background: linear-gradient(135deg, #0284c7 0%, #075985 100%);
                        height: 520px;
                        position: relative;
                    ">
                        <div class="hero-content position-relative h-100 d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 text-white">
                                        <span class="badge bg-warning text-dark mb-3">
                                            <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi B
                                        </span>
                                        <h1 class="display-4 fw-bold mb-3">
                                            {{ $profil?->nama_sekolah ?? 'Sekolah Kami' }}
                                        </h1>
                                        <p class="lead mb-4">
                                            {{ Str::limit($profil?->deskripsi ?? 'Membangun generasi berprestasi dan berkarakter melalui pendidikan berkualitas.', 200) }}
                                        </p>
                                    </div>
                                    @if($profil?->logo)
                                        <div class="col-lg-5 d-none d-lg-block text-center">
                                            <img src="{{ asset('uploads/profil/' . $profil->logo) }}"
                                                 alt="Logo"
                                                 class="img-fluid" style="max-height: 280px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        @if($galeriHero->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        @endif
    </div>
</section>

