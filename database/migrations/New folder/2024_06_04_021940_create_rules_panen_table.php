<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_panen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_rule')->unique();
            $table->unsignedBigInteger('usia_cabai_id');
            $table->unsignedBigInteger('ph_tanah_id');
            $table->unsignedBigInteger('kondisi_iklim_id');
            $table->unsignedBigInteger('karakteristik_tanaman_id');
            $table->unsignedBigInteger('dosis_pupuk_id');
            // $table->float('bobot');
            $table->text('keterangan')->nullable();
            $table->timestamps();
    
            $table->foreign('usia_cabai_id')->references('id')->on('usia_cabai_panen');
            $table->foreign('ph_tanah_id')->references('id')->on('ph_tanah_panen');
            $table->foreign('kondisi_iklim_id')->references('id')->on('kondisi_iklim_panen');
            $table->foreign('karakteristik_tanaman_id')->references('id')->on('karakteristik_tanaman_panen');
            $table->foreign('dosis_pupuk_id')->references('id')->on('dosis_pupuk_panen');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rules_panen');
    }
    
}
