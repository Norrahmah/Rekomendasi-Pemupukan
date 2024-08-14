<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPupukPanen extends Model
{
    use HasFactory;
    protected $table = 'jenis_pupuk_panen';
    protected $fillable = [
        'kode_pupuk', 'nama_pupuk', 'keterangan'
    ];
}
