<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendationTumbuh extends Model
{
    use HasFactory;

    protected $table = 'recommendation_tumbuh';

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

    public function rule()
    {
        return $this->belongsTo(RulesTumbuh::class, 'rules_id');
    }
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'petani_id');
    }
}
