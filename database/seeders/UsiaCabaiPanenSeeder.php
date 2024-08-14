<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsiaCabaiPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('usia_cabai_panen')->insert([
            [
                'kode_cabai' => 'UC1',
                'usia' => 'Panen Ke - 1', // 0-30 hari
                'keterangan' => 'Panen Pertama Kali',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_cabai' => 'UC2',
                'usia' => 'Panen Ke - 2', // 31-90 hari
                'keterangan' => 'Panen Ke 2 Kalinya',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_cabai' => 'UC3',
                'usia' => 'Panen Ke - 3', // 91-180 hari
                'keterangan' => 'Panen Ke 3 Kalinya',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
