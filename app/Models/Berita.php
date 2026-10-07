<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasUuids;   // ✅ Tambahkan

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $incrementing = false;    // ✅ Karena UUID
    protected $keyType = 'string';   // ✅ Karena UUID
    public $timestamps = true;       // ✅ Migration kamu pakai timestamps()

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal',
        'gambar',
        'status',
        'id_user',   // ✅ 'id_user', bukan 'id_users'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');   // ✅
    }
}
