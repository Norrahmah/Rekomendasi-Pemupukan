<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulesPanen extends Model
{
    use HasFactory;

    protected $table = 'rules_panen';
    protected $fillable = [
        'kode_rule', 'usia_cabai_id', 'ph_tanah_id', 'kondisi_iklim_id', 'karakteristik_tanaman_id',
        'dosis_pupuk_id', 'keterangan'
    ];

    public function usiaCabai()
    {
        return $this->belongsTo(UsiaCabaiPanen::class, 'usia_cabai_id');
    }

    public function phTanah()
    {
        return $this->belongsTo(PhTanahPanen::class, 'ph_tanah_id');
    }

    public function kondisiIklim()
    {
        return $this->belongsTo(KondisiIklimPanen::class, 'kondisi_iklim_id');
    }

    public function karakteristikTanaman()
    {
        return $this->belongsTo(KarakteristikTanamanPanen::class, 'karakteristik_tanaman_id');
    }

    public function dosisPupuk()
    {
        return $this->belongsTo(DosisPupukPanen::class, 'dosis_pupuk_id');
    }

}
