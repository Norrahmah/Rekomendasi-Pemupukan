<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\DosisPupukTumbuh;
use App\Models\JenisPupukTumbuh;

class DosisPupukTumbuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisPupuk = JenisPupukTumbuh::firstOrCreate(['nama_pupuk' => 'Pupuk NPK']);

        DosisPupukTumbuh::create([
            'kode_dosis' => 'DP1',
            'jenis_pupuk_id' => $jenisPupuk->id,
            'dosis' => '10',
            'satuan' => 'gram',
            'pelarutan' => 'larut dalam air',
            'cara_pakai' => 'disemprotkan pada tanaman',
            'keterangan' => 'Pupuk untuk pemupukan awal'
        ]);

        DosisPupukTumbuh::create([
            'kode_dosis' => 'DP2',
            'jenis_pupuk_id' => $jenisPupuk->id,
            'dosis' => '20',
            'satuan' => 'gram',
            'pelarutan' => 'larut dalam air',
            'cara_pakai' => 'ditaburkan di sekitar akar tanaman',
            'keterangan' => 'Pupuk untuk pemupukan lanjutan'
        ]);
    }
}
