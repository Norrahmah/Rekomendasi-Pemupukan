<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLokasiAndLuasToPetaniTable extends Migration
{
    public function up()
    {
        Schema::table('petanis', function (Blueprint $table) {
            $table->string('lokasi')->nullable()->after('alamat');
            $table->string('luas')->nullable()->after('lokasi');
        });
    }

    public function down()
    {
        Schema::table('petanis', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->dropColumn('luas');
        });
    }
}
