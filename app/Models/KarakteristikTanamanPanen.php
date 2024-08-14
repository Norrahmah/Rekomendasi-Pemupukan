<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarakteristikTanamanPanen extends Model
{
    use HasFactory;
    protected $table = 'karakteristik_tanaman_panen';
    protected $fillable = [
        'kode_tanaman', 'karakteristik', 'keterangan', 'gambar'
    ];
}
