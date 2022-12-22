<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_masters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('nik')->nullable();
            $table->string('desa_kode');
            $table->string('tanggal_lahir')->nullable();
            $table->string('umur')->nullable();
            $table->string('dusun')->nullable();
            $table->enum('jenkel',['L','P']);
            $table->enum('status',['Rawat Inap','Rawat Jalan','Mendaftar'])->default('Mendaftar');
            $table->enum('Pembayaran',['BPJS','UMUM'])->default('BPJS');
            $table->enum('rawat_inap',['Y','N'])->default('N');
            $table->string('kepala_keluarga');
            $table->string('no_bpjs')->nullable();
            $table->string('no_rm_keluarga')->nullable();
            $table->string('rm_sum')->nullable();
            $table->string('status_kode');
            $table->integer('status_farmasi')->default(1);
            $table->string('no_rm');
            $table->enum('ruang',['Pemeriksaan Umum','Kesehatan Gigi & Mulut','Kesehatan Ibu & KB','Kesehatan Anak & Imunisasi','Administrasi',
            'Laboratorium','Promosi Kesehatan','Farmasi','Rawat Inap']);
            $table->string('no_antrian')->nullable();
           
            $table->enum('stats',['Berobat','Menginap','Sudah Pulang','Regist']);
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
        Schema::dropIfExists('pasien_masters');
    }
}
