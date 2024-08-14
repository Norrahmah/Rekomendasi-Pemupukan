<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsiaCabaiPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usia_cabai_panen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_cabai')->unique();
            $table->string('usia');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('usia_cabai_panen');
    }
    
}
