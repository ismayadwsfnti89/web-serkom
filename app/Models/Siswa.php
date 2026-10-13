<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = true;

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tahun_masuk',
    ];
}
