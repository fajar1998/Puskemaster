<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekmedPengobatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekmed_pengobatans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->integer('id_obat');
            $table->integer('jumlah_obat');
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
        Schema::dropIfExists('rekmed_pengobatans');
    }
}
