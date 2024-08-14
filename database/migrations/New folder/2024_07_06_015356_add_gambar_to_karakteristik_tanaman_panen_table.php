<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarToKarakteristikTanamanPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karakteristik_tanaman_panen', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karakteristik_tanaman_panen', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
}
