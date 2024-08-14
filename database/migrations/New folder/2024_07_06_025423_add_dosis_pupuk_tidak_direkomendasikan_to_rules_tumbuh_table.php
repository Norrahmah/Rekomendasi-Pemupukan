<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDosisPupukTidakDirekomendasikanToRulesTumbuhTable extends Migration
{
    public function up()
    {
        Schema::table('rules_tumbuh', function (Blueprint $table) {
            $table->unsignedBigInteger('dosis_pupuk_tidak_direkomendasikan_id')->nullable()->after('dosis_pupuk_id');
            $table->foreign('dosis_pupuk_tidak_direkomendasikan_id')->references('id')->on('dosis_pupuk_tumbuh');
        });
    }

    public function down()
    {
        Schema::table('rules_tumbuh', function (Blueprint $table) {
            $table->dropForeign(['dosis_pupuk_tidak_direkomendasikan_id']);
            $table->dropColumn('dosis_pupuk_tidak_direkomendasikan_id');
        });
    }
}
