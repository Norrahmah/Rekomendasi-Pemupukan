<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosisPupukPanen extends Model
{
    use HasFactory;

    protected $table = 'dosis_pupuk_panen';

    protected $fillable = [
        'kode_dosis', 
        'jenis_pupuk_id', 
        'dosis', 
        'satuan', 
        'pelarutan',  
        'cara_pakai', 
        'keterangan',
        'pemupukan_ulang'
    ];

    public function jenisPupuk()
    {
        return $this->belongsTo(JenisPupukPanen::class, 'jenis_pupuk_id');
    }
}
