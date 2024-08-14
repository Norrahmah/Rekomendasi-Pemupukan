<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsiaCabaiTumbuh extends Model
{
    use HasFactory;
    protected $table = 'usia_cabai_tumbuh';
    protected $fillable = [
        'kode_cabai', 'usia', 'keterangan',
    ];
}
