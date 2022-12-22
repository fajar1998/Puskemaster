<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeederMaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('pasien_masters')->count() == 0){

            DB::table('pasien_masters')->insert([
            [
            'nama_pasien' => 'Minah',
            'tanggal_lahir' => '2013-09-29',
            'kepala_keluarga' => 'Bojel',
            'desa_kode' => '06',
            'status_kode' => '04',
            'no_rm' => '06000104',
            'ruang' => 'Pemeriksaan Umum',
            'jenkel' => 'Perempuan',
            'stats' => 'Sudah Pulang',
            'status' => 'Rawat Jalan',
           
            ]
            ]);
        }
    }
}
