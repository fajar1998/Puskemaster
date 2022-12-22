<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap_finals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->string('keluhan');
            $table->string('tgl_masuk');
            $table->string('tgl_keluar');
            $table->string('diagnosa')->nullable();
            $table->string('keterangan_keluar')->nullable();
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
        Schema::dropIfExists('rawat_inap_finals');
    }
}
