<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarToJenisPupukTumbuhTable extends Migration
{
    public function up()
    {
        Schema::table('jenis_pupuk_tumbuh', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('keterangan');
        });
    }

    public function down()
    {
        Schema::table('jenis_pupuk_tumbuh', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
}
