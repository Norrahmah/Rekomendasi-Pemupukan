<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarakteristikTanamanPanenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karakteristik_tanaman_panen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_tanaman')->unique();
            $table->string('karakteristik');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('karakteristik_tanaman_panen');
    }
    
}
