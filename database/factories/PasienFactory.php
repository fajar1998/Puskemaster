<?php

namespace Database\Factories;

use App\Models\PasienMaster;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PasienFactory extends Factory
{
    
   
        protected $model = PasienMaster::class;
 
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pasien' => $this->faker->name,
            'tanggal_lahir' => $this->faker->date,
            'no_antrian' => $this->faker->unique()->numberBetween(1,2000),
            'desa_kode' => $this->faker->numberBetween(01,05),
            'status_kode' => $this->faker->numberBetween(01,05),
            'status_farmasi' => $this->faker->randomElement(['1' ,'2']),
            'no_rm' => $this->faker->numerify('##########'),
            'ruang' => $this->faker->randomElement(['Pemeriksaan Umum','Kesehatan Gigi & Mulut','Kesehatan Ibu & KB','Kesehatan Anak & Imunisasi','Administrasi',
            'Laboratorium','Promosi Kesehatan','Farmasi']),
            'jenkel' => $this->faker->randomElement(['Laki-Laki' ,'Perempuan']),
            'stats' => $this->faker->randomElement(['Berobat' ,'Sudah Pulang']),
        ];
    }
    }

