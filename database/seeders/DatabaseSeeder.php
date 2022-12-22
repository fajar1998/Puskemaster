<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(PasienUmumSeeder::class); 
        // $this->call(PasienBPJSSeeder::class); 
        $this->call(PasienSeederMaster::class); 
        $this->call(AlamatSeeder::class); 
        $this->call(UserSeeder::class); 
        $this->call(StatusKKSSeeder::class); 
        $this->call(DiagnosaSeeder::class); 
        $this->call(SoGudangSeeder::class); 
    }
}
