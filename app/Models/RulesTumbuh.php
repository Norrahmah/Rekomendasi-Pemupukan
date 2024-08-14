<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulesTumbuh extends Model
{
    use HasFactory;

    protected $table = 'rules_tumbuh';
    protected $fillable = [
        'kode_rule', 'usia_cabai_id', 'ph_tanah_id', 'kondisi_iklim_id', 'karakteristik_tanaman_id',
        'dosis_pupuk_id', 'keterangan'
    ];

    public function usiaCabai()
    {
        return $this->belongsTo(UsiaCabaiTumbuh::class, 'usia_cabai_id');
    }

    public function phTanah()
    {
        return $this->belongsTo(PhTanahTumbuh::class, 'ph_tanah_id');
    }

    public function kondisiIklim()
    {
        return $this->belongsTo(KondisiIklimTumbuh::class, 'kondisi_iklim_id');
    }

    public function karakteristikTanaman()
    {
        return $this->belongsTo(KarakteristikTanamanTumbuh::class, 'karakteristik_tanaman_id');
    }

    public function dosisPupuk()
    {
        return $this->belongsTo(DosisPupukTumbuh::class, 'dosis_pupuk_id');
    }

}
