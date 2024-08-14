<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPetaniIdToRecommendationPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommendation_panen', function (Blueprint $table) {
            $table->unsignedBigInteger('petani_id')->nullable();

            $table->foreign('petani_id')->references('id')->on('petanis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recommendation_panen', function (Blueprint $table) {
            $table->dropForeign(['petani_id']);
            $table->dropColumn('petani_id');
        });
    }
}
