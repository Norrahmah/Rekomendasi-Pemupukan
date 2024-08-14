<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarToKarakteristikTanamanTumbuhTable extends Migration
{
    public function up()
    {
        Schema::table('karakteristik_tanaman_tumbuh', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('keterangan');
        });
    }

    public function down()
    {
        Schema::table('karakteristik_tanaman_tumbuh', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
}
