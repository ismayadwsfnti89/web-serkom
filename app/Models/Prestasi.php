<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasUuids;   

    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'nama_prestasi',
        'tingkat',
        'juara',
        'tahun',
        'deskripsi',
        'foto',
    ];
}
