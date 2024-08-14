<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPemupukanUlangToDosisPupukPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dosis_pupuk_panen', function (Blueprint $table) {
            $table->string('pemupukan_ulang')->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dosis_pupuk_panen', function (Blueprint $table) {
            $table->dropColumn('pemupukan_ulang');
        });
    }
}
