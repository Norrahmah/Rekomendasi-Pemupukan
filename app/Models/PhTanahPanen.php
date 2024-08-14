<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhTanahPanen extends Model
{
    use HasFactory;
    protected $table = 'ph_tanah_panen';
    protected $fillable = [
        'kode_ph', 'ph_level', 'keterangan'
    ];
}
