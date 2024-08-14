<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhTanahPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ph_tanah_panen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_ph')->unique();
            $table->string('ph_level');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ph_tanah_panen');
    }
    
}
