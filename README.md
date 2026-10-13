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
