<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    protected $table = 'profil_sekolah';   // ✅ nama tabel di DB
    protected $primaryKey = 'id_profil';
    public $timestamps = true;

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
