<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RulesTumbuh;
use App\Models\UsiaCabaiTumbuh;
use App\Models\PhTanahTumbuh;
use App\Models\KondisiIklimTumbuh;
use App\Models\KarakteristikTanamanTumbuh;
use App\Models\DosisPupukTumbuh;

class RulesTumbuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil ID dari model terkait
        $usiaCabaiId = UsiaCabaiTumbuh::first()->id;
        $phTanahId = PhTanahTumbuh::first()->id;
        $kondisiIklimId = KondisiIklimTumbuh::first()->id;
        $karakteristikTanamanId = KarakteristikTanamanTumbuh::first()->id;
        $dosisPupukId = DosisPupukTumbuh::first()->id;

        // Buat data rules_tumbuh
        RulesTumbuh::create([
            'kode_rule' => 'R1',
            'usia_cabai_id' => $usiaCabaiId,
            'ph_tanah_id' => $phTanahId,
            'kondisi_iklim_id' => $kondisiIklimId,
            'karakteristik_tanaman_id' => $karakteristikTanamanId,
            'dosis_pupuk_id' => $dosisPupukId,
            'keterangan' => 'Pupuk NPK dengan dosis 100 gram per tanaman karena kondisi cocok',
        ]);

        RulesTumbuh::create([
            'kode_rule' => 'R2',
            'usia_cabai_id' => $usiaCabaiId,
            'ph_tanah_id' => $phTanahId,
            'kondisi_iklim_id' => $kondisiIklimId,
            'karakteristik_tanaman_id' => $karakteristikTanamanId,
            'dosis_pupuk_id' => $dosisPupukId,
            'keterangan' => 'Pupuk Urea dengan dosis 50 gram per tanaman karena kondisi cocok',
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
