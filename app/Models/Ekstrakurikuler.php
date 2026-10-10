<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasUuids;

    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_ekskul';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'nama_ekskul',
        'slug',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
