<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiIklimPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kondisi_iklim_panen')->insert([
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
