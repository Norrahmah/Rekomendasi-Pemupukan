<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationPanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendation_panens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_input_panen_id')->constrained();
            $table->string('usia_cabai');
            $table->string('ph_tanah');
            $table->string('kondisi_iklim');
            $table->string('karakteristik_tanaman');
            $table->string('jenis_pupuk');
            $table->integer('dosis');
            $table->string('satuan');
            $table->string('cara_pakai');
            $table->decimal('persentase_kecocokan', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommendation_panens');
    }
}
