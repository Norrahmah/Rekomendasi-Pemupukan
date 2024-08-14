<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPupukTumbuhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pupuk_tumbuh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pupuk')->unique();
            $table->string('nama_pupuk');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('jenis_pupuk_tumbuh');
    }
    
}
