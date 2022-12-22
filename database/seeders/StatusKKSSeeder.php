<?php

namespace Database\Seeders;

use App\Models\StatusKK;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKKSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('status_k_k_s')->count() == 0){

            DB::table('status_k_k_s')->insert([
            [
            'name' => 'Kepala Keluarga',
            'kode_stats' => '00',
            ],
            [
            'name' => 'Istri',
             'kode_stats' => '01',
            ],
            [
            'name' => 'Anak 1',
            'kode_stats' => '02',
            ],
            [
            'name' => 'Anak 2',
            'kode_stats' => '03',
             ],
                        [
            'name' => 'Anak 3',
            'kode_stats' => '04',
            ],
            [
            'name' => 'Anak 4',
            'kode_stats' => '05',
            ]
            ]);
}
}}
