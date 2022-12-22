<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekmedPlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekmed_plays', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->integer('id_alamat');
            $table->integer('id_diagnosa')->nullable();
            $table->string('umur');
            $table->string('bayar');
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
        Schema::dropIfExists('rekmed_plays');
    }
}
