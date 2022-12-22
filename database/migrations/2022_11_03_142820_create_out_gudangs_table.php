<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_gudangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_obat');
            $table->integer('jumlah_keluar');
            $table->enum('penerima',['Apotek','Pustu','Poskesdes','Rawat Inap','IGD']);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('out_gudangs');
    }
}
