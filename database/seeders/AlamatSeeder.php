<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('alamats')->count() == 0){

            DB::table('alamats')->insert([
            [
            'nama_desa' => 'Sentebang',
            'kode_desa' => '07',
            ],
            [
            'nama_desa' => 'Sei-Nyirih',
            'kode_desa' => '06',
             ],
            [
            'nama_desa' => 'Bakau',
            'kode_desa' => '05',
            ],
            [
            'nama_desa' => 'Setie',
            'kode_desa' => '04',
            ],
            ]);
        }
    }
}
