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
        'npsn',
        'tahun_berdiri',
        'kepala_sekolah',
        'foto_kepala_sekolah',  
        'deskripsi',
        'visi_misi',
        'alamat',
        'kontak',
        'logo',
        'foto',
    ];
}
