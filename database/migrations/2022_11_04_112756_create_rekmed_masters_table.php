<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekmedMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekmed_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->string('desa_kode');
            $table->integer('id_diagnosa')->nullable();
            $table->string('bayar');
            $table->string('umur');
            $table->string('jenkel');
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
        Schema::dropIfExists('rekmed_masters');
    }
}
