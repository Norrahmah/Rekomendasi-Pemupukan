<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInputPanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_input_panens', function (Blueprint $table) {
            $table->id();
            $table->string('usia_cabai');
            $table->string('ph_tanah');
            $table->string('kondisi_iklim');
            $table->string('karakteristik_tanaman');
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
        Schema::dropIfExists('user_input_panens');
    }
}
