<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhTanahTumbuh extends Model
{
    use HasFactory;
    protected $table = 'ph_tanah_tumbuh';
    protected $fillable = [
        'kode_ph', 'ph_level', 'keterangan'
    ];
}
