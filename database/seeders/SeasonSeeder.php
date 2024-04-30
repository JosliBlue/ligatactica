<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $fechaInicio = $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d');
        $fechaFin = $faker->dateTimeBetween($fechaInicio, '+1 year')->format('Y-m-d');
        Season::create([
            'nombre' => 'Relampago',
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
            'status' => true
        ]);
        /*
        foreach (range(1, 1) as $index) {
            $fechaInicio = $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d');
            $fechaFin = $faker->dateTimeBetween($fechaInicio, '+1 year')->format('Y-m-d');
            Season::create([
                'nombre' => $faker->sentence(2),
                'fecha_inicio' => $fechaInicio,
                'fecha_fin' => $fechaFin,
                'status' => $faker->boolean()
            ]);
        }
        */
    }
}
