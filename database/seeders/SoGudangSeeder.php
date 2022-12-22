<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoGudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('so_gudangs')->count() == 0){

            DB::table('so_gudangs')->insert([
            [
            'name' => 'Paracetamol',
            'batch' => 'A002',
            'jumlah' => '736',
            'expired' => \Carbon\Carbon::createFromDate(2023,04,01)->toDateTimeString()
            ]
           
            ]);
}
    }
}
