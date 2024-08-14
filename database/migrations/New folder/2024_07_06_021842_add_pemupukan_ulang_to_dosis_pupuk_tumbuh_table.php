<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPemupukanUlangToDosisPupukTumbuhTable extends Migration
{
    public function up()
    {
        Schema::table('dosis_pupuk_tumbuh', function (Blueprint $table) {
            $table->string('pemupukan_ulang')->nullable()->after('keterangan');
        });
    }

    public function down()
    {
        Schema::table('dosis_pupuk_tumbuh', function (Blueprint $table) {
            $table->dropColumn('pemupukan_ulang');
        });
    }
}
