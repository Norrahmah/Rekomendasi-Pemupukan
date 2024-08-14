<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiIklimTumbuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kondisi_iklim_tumbuh')->insert([
            [
                'kode_iklim' => 'KI1',
                'kondisi' => 'Tropis',
                'keterangan' => 'Kondisi iklim tropis',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_iklim' => 'KI2',
                'kondisi' => 'Subtropis',
                'keterangan' => 'Kondisi iklim subtropis',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
