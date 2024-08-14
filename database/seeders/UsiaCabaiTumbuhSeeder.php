<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsiaCabaiTumbuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('usia_cabai_tumbuh')->insert([
            [
                'kode_cabai' => 'UC1',
                'usia' => '0-30', // 0-30 hari
                'keterangan' => 'Usia awal pertumbuhan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_cabai' => 'UC2',
                'usia' => '31-90', // 31-90 hari
                'keterangan' => 'Usia pertumbuhan vegetatif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_cabai' => 'UC3',
                'usia' => '91-180', // 91-180 hari
                'keterangan' => 'Usia pertumbuhan generatif',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
