<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 11) as $index) {
            Player::create([
                'cedula' => $faker->unique()->numberBetween(1000000, 9999999),
                'nombres' => $faker->firstName .' '. $faker->firstName,
                'apellidos' => $faker->lastName .' '. $faker->lastName,
                'fecha_nacimiento' => $faker->date(),
                'numero_camiseta' => $faker->numberBetween(1,50),
                'url_foto' => ''
            ]);
        }
    }
}
