<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsiaCabaiPanen extends Model
{
    use HasFactory;
    protected $table = 'usia_cabai_panen';
    protected $fillable = [
        'kode_cabai', 'usia', 'keterangan',
    ];
}
