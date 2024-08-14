<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhTanahPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ph_tanah_panen')->insert([
            [
                'kode_ph' => 'PH1',
                'ph_level' => '5.5-6.5',
                'keterangan' => 'Tanah agak asam',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_ph' => 'PH2',
                'ph_level' => '6.5-7.5',
                'keterangan' => 'Tanah netral',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_ph' => 'PH3',
                'ph_level' => '7.5-8.5',
                'keterangan' => 'Tanah agak basa',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
