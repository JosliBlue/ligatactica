<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Iterar para crear múltiples ubicaciones
        for ($i = 0; $i < 11; $i++) {
            Location::create([
                'barrio' => $faker->city,
                'calle_1' => $faker->streetName,
                'calle_2' => $faker->streetName,
                'url_foto' => ''
            ]);
        }
    }
}
