<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiIklimPanen extends Model
{
    use HasFactory;
    protected $table = 'kondisi_iklim_panen';
    protected $fillable = [
        'kode_iklim', 'kondisi', 'keterangan'
    ];
}
