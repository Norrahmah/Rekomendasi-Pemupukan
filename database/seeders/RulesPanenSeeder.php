<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RulesPanen;
use App\Models\UsiaCabaiPanen;
use App\Models\PhTanahPanen;
use App\Models\KondisiIklimPanen;
use App\Models\KarakteristikTanamanPanen;
use App\Models\DosisPupukPanen;

class RulesPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil ID dari model terkait
        $usiaCabaiId = UsiaCabaiPanen::first()->id;
        $phTanahId = PhTanahPanen::first()->id;
        $kondisiIklimId = KondisiIklimPanen::first()->id;
        $karakteristikTanamanId = KarakteristikTanamanPanen::first()->id;
        $dosisPupukId = DosisPupukPanen::first()->id;

        // Buat data rules_tumbuh
        RulesPanen::create([
            'kode_rule' => 'R1',
            'usia_cabai_id' => $usiaCabaiId,
            'ph_tanah_id' => $phTanahId,
            'kondisi_iklim_id' => $kondisiIklimId,
            'karakteristik_tanaman_id' => $karakteristikTanamanId,
            'dosis_pupuk_id' => $dosisPupukId,
            'keterangan' => 'Pupuk NPK dengan dosis 100 gram per tanaman karena kondisi cocok',
        ]);

        RulesPanen::create([
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
