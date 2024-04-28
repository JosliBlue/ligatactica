<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposJuego = ['FUTBOL', 'BOLI'];
        $rangos = ['A', 'B', 'C'];
        $generos = ['HOMBRES', 'MUJERES'];

        Division::create([
            'rango' => $rangos[0], // Aquí selecciona el primer elemento del array de rangos
            'tipo' => $tiposJuego[0], // Aquí selecciona el primer elemento del array de tipos de juego
            'genero' => $generos[0], // Aquí selecciona el primer elemento del array de géneros
            'team_id' => 1,
            'season_id' => 1
        ]);
    }
}
