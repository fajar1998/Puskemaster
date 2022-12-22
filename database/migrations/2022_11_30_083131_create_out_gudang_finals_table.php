<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutGudangFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_gudang_finals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('jumlah');
            $table->string('penerima');
            $table->string('kadaluarsa');
            $table->string('tanggal_keluar');
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
        Schema::dropIfExists('out_gudang_finals');
    }
}
