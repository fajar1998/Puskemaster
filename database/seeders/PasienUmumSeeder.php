<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PasienUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $faker = Faker::create('id_ID');
        $dt = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now');
        for($i = 1; $i <= 1000; $i++){
            DB::table('pasien_masters')->insert([
                'nama_pasien' => $faker->name,
                'kepala_keluarga' => $faker->name,
                'jenkel' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'stats' => $faker->randomElement(['Berobat', 'Sudah Pulang']),
                'rawat_inap' => $faker->randomElement(['Y', 'N']),
                'desa_kode' => $faker->numberBetween(04,07),
                'nik' => $faker->numberBetween(2524513,896858567),
                'status_kode' => $faker->numberBetween(01,04),
                'no_rm' => $faker->unique()->numberBetween(3002,50000), 
                'tanggal_lahir' => $faker->dateTimeBetween( '-60 years','-3 years')->format('Y-m-d'),
                'umur' => $faker->numberBetween(9,58),
                'created_at' => $faker->dateTimeBetween( '-20 years'),
                'ruang' => $faker->randomElement(['Pemeriksaan Umum','Kesehatan Gigi & Mulut','Kesehatan Ibu & KB','Kesehatan Anak & Imunisasi',
                'Laboratorium','Promosi Kesehatan']),
            ]);

          }
    }
}
