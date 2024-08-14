<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendation_panen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usia_cabai_id');
            $table->unsignedBigInteger('ph_tanah_id');
            $table->unsignedBigInteger('kondisi_iklim_id');
            $table->unsignedBigInteger('karakteristik_tanaman_id');
            $table->unsignedBigInteger('rules_id')->nullable();
            $table->timestamp('tgl_input')->useCurrent();
            $table->integer('match_score');
            $table->timestamps();

            $table->foreign('usia_cabai_id')->references('id')->on('usia_cabai_panen')->onDelete('cascade');
            $table->foreign('ph_tanah_id')->references('id')->on('ph_tanah_panen')->onDelete('cascade');
            $table->foreign('kondisi_iklim_id')->references('id')->on('kondisi_iklim_panen')->onDelete('cascade');
            $table->foreign('karakteristik_tanaman_id')->references('id')->on('karakteristik_tanaman_panen')->onDelete('cascade');
            $table->foreign('rules_id')->references('id')->on('rules_panen')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommendation_panen');
    }
}
