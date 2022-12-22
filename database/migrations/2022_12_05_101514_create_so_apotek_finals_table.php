<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoApotekFinalsTable extends Migration
{
   
    public function up()
    {
        Schema::create('so_apotek_finals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('jumlah');
            $table->string('batch');
            $table->string('expired');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('so_apotek_finals');
    }
}
