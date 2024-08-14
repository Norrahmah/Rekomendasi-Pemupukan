<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKondisiIklimTumbuhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_iklim_tumbuh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_iklim')->unique();
            $table->string('kondisi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kondisi_iklim_tumbuh');
    }
    
}
