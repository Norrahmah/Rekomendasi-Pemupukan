<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMatchDetailsToRecommendationTumbuhTable extends Migration
{
    public function up()
    {
        Schema::table('recommendation_tumbuh', function (Blueprint $table) {
            $table->text('match_details')->nullable();
        });
    }

    public function down()
    {
        Schema::table('recommendation_tumbuh', function (Blueprint $table) {
            $table->dropColumn('match_details');
        });
    }
}
