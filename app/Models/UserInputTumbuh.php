<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInputTumbuh extends Model
{
    use HasFactory;
    protected $fillable = [
        'usia_cabai',
        'ph_tanah',
        'kondisi_iklim',
        'karakteristik_tanaman',
    ];
}
