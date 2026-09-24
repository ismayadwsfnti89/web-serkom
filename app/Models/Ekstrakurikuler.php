<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasUuids;   // ✅ karena UUID

    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_ekskul';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
