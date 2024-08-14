<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiIklimTumbuh extends Model
{
    use HasFactory;
    protected $table = 'kondisi_iklim_tumbuh';
    protected $fillable = [
        'kode_iklim', 'kondisi', 'keterangan'
    ];
}
