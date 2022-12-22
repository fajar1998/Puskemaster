<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inaps', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->integer('nik');
            $table->integer('no_bpjs')->nullable();
            $table->enum('ruang',['Laki-Laki','Perempuan']);
            $table->string('keluhan');
            $table->string('tgl_masuk');
            $table->string('diagnosa')->nullable();
            $table->enum('status',['Pulang','Menginap'])->nullable();
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
        Schema::dropIfExists('rawat_inaps');
    }
}
