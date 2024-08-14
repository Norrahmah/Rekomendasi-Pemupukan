<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosisPupukPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosis_pupuk_panen', function (Blueprint $table) {
            $table->id();
            $table->string('kode_dosis')->unique();
            $table->foreignId('jenis_pupuk_id')->constrained('jenis_pupuk_panen')->onDelete('cascade');
            $table->string('dosis');
            $table->string('satuan');
            $table->string('pelarutan')->nullable();
            $table->string('cara_pakai')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosis_pupuk_panen');
    }
    
}
