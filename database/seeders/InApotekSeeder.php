<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class InApotekSeeder extends Seeder
{
    
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 500; $i++){
            DB::table('out_apoteks')->insert([
                // 'name' => $faker->unique()->name,
                'updated_at' => $faker->dateTimeBetween('-30 days', '+300 days'),
                // 'batch' => $faker->unique()->numberBetween(1000,5000), 
                'penerima' => 'Pasien', 
                'jumlah_keluar' => $faker->unique()->numberBetween(100,900), 
                'id_obat' => $faker->unique()->numberBetween(1,499), 
               
            ]);

          }
    }
}
