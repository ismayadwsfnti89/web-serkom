<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Pesan Validasi Bahasa Indonesia
    |--------------------------------------------------------------------------
    */

    'required'  => ':attribute wajib diisi.',
    'string'    => ':attribute harus berupa teks.',
    'integer'   => ':attribute harus berupa angka.',
    'numeric'   => ':attribute harus berupa angka.',
    'email'     => ':attribute harus berupa email yang valid.',
    'unique'    => ':attribute sudah dipakai, coba yang lain.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date'      => ':attribute bukan tanggal yang valid.',
    'boolean'   => ':attribute harus bernilai ya atau tidak.',

    'min' => [
        'numeric' => ':attribute minimal :min.',
        'string'  => ':attribute minimal :min karakter.',
        'file'    => ':attribute minimal :min kilobyte.',
    ],
    'max' => [
        'numeric' => ':attribute maksimal :max.',
        'string'  => ':attribute maksimal :max karakter.',
        'file'    => ':attribute maksimal :max kilobyte.',
    ],
    'between' => [
        'numeric' => ':attribute harus antara :min sampai :max.',
        'string'  => ':attribute harus antara :min sampai :max karakter.',
    ],
    'size' => [
        'numeric' => ':attribute harus :size.',
        'string'  => ':attribute harus :size karakter.',
        'file'    => ':attribute harus :size kilobyte.',
    ],

    'in' => ':attribute yang dipilih tidak valid.',
    'not_in' => ':attribute yang dipilih tidak valid.',
    'image' => ':attribute harus berupa gambar.',
    'file' => ':attribute harus berupa file.',
    'mimes' => ':attribute harus berformat :values.',
    'digits' => ':attribute harus :digits digit.',
    'date_format' => ':attribute tidak sesuai format :format.',
    'regex' => 'Format :attribute tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Nama Field (biar pesan lebih enak dibaca)
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        // Auth
        'username' => 'Username',
        'password' => 'Password',

        // Siswa
        'nisn' => 'NISN',
        'nama_siswa' => 'Nama siswa',
        'jenis_kelamin' => 'Jenis kelamin',
        'tahun_masuk' => 'Tahun masuk',

        // Guru
        'nama_guru' => 'Nama guru',
        'nip' => 'NIP',
        'jabatan' => 'Jabatan',
        'mapel' => 'Mata pelajaran',
        'foto' => 'Foto',

        // Ekstrakurikuler
        'nama_ekskul' => 'Nama ekstrakurikuler',
        'pembina' => 'Pembina',
        'jadwal_latihan' => 'Jadwal latihan',
        'gambar' => 'Gambar',
        'deskripsi' => 'Deskripsi',

        // Prestasi
        'nama_prestasi' => 'Nama prestasi',
        'tingkat' => 'Tingkat',
        'juara' => 'Juara',
        'tahun' => 'Tahun',

        // Berita & Pengumuman
        'judul' => 'Judul',
        'isi' => 'Isi',
        'tanggal' => 'Tanggal',
        'status' => 'Status',

        // Galeri
        'file' => 'File',
        'kategori' => 'Kategori',
        'keterangan' => 'Keterangan',

        // User
        'nama' => 'Nama',
        'role' => 'Role',

        // Profil Sekolah
        'nama_sekolah' => 'Nama sekolah',
        'kepala_sekolah' => 'Kepala sekolah',
        'npsn' => 'NPSN',
        'alamat' => 'Alamat',
        'kontak' => 'Kontak',
        'visi_misi' => 'Visi & Misi',
        'tahun_berdiri' => 'Tahun berdiri',
        'logo' => 'Logo',
    ],
];