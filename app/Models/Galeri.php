<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];

    /**
     * Cek: apakah item ini video YouTube?
     */
    public function isVideo()
    {
        return $this->kategori === 'Video';
    }

    /**
     * Ambil ID video dari link YouTube.
     * Return string ID, atau null kalau bukan link YouTube valid.
     */
    public function getVideoIdAttribute()
    {
        if ($this->kategori !== 'Video') {
            return null;
        }

        $pola = '/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/|v\/)|youtu\.be\/)([^"&?\/\s]{11})/';

        if (preg_match($pola, $this->file, $hasil)) {
            return $hasil[1];
        }

        return null;
    }

    /**
     * URL thumbnail YouTube (kalau video).
     * Return URL string, atau null kalau bukan video.
     */
    public function getThumbnailAttribute()
    {
        if ($this->kategori === 'Foto') {
            return asset('uploads/galeri/' . $this->file);
        }

        if ($this->video_id) {
            return 'https://img.youtube.com/vi/' . $this->video_id . '/hqdefault.jpg';
        }

        return null;
    }
}
