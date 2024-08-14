<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendationPanen extends Model
{
    use HasFactory;

    protected $table = 'recommendation_panen';

    protected $fillable = [
        'usia_cabai_id',
        'ph_tanah_id',
        'kondisi_iklim_id',
        'karakteristik_tanaman_id',
        'rules_id',
        'tgl_input',
        'match_score',
        'match_details',
        'petani_id',
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

    public function rule()
    {
        return $this->belongsTo(RulesPanen::class, 'rules_id');
    }
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'petani_id');
    }
}
