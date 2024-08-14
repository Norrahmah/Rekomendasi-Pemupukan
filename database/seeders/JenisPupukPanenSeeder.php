<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPupukPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pupuk_panen')->insert([
            [
                'kode_pupuk' => 'JP1',
                'nama_pupuk' => 'Pupuk NPK',
                'keterangan' => 'Pupuk majemuk yang mengandung unsur Nitrogen (N), Phosphor (P), dan Kalium (K)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_pupuk' => 'JP2',
                'nama_pupuk' => 'Pupuk Urea',
                'keterangan' => 'Pupuk tunggal yang mengandung unsur Nitrogen (N) tinggi',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
