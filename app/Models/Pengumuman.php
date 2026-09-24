<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    public $timestamps = true;   // ✅ Migration pakai timestamps()

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
        'id_user',   // ✅
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');   // ✅
    }
}
