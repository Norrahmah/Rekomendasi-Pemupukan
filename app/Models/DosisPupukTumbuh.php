<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosisPupukTumbuh extends Model
{
    use HasFactory;

    protected $table = 'dosis_pupuk_tumbuh';

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
        return $this->belongsTo(JenisPupukTumbuh::class, 'jenis_pupuk_id');
    }
}
