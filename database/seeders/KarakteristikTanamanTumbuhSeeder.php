<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KarakteristikTanamanTumbuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karakteristik_tanaman_tumbuh')->insert([
            [
                'kode_tanaman' => 'KT1',
                'karakteristik' => 'Tanaman pendek',
                'keterangan' => 'Tanaman dengan tinggi kurang dari 1 meter',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_tanaman' => 'KT2',
                'karakteristik' => 'Tanaman sedang',
                'keterangan' => 'Tanaman dengan tinggi 1-2 meter',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_tanaman' => 'KT3',
                'karakteristik' => 'Tanaman tinggi',
                'keterangan' => 'Tanaman dengan tinggi lebih dari 2 meter',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
