<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarakteristikTanamanTumbuh extends Model
{
    use HasFactory;
    protected $table = 'karakteristik_tanaman_tumbuh';
    protected $fillable = [
        'kode_tanaman', 'karakteristik', 'keterangan', 'gambar'
    ];
}
