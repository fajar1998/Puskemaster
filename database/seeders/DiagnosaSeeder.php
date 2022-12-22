<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('diagnosas')->count() == 0){

            DB::table('diagnosas')->insert([
            ['name' => 'Hipertensi',],
            ['name' => 'Bipolar',],
            ['name' => 'Diabetes',],
            ['name' => 'Disorder',],
            ['name' => 'Demam',],
                            ]);
}
}
    
}
