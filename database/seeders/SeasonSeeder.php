<?php

namespace Database\Seeders;

use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fechaInicio = Carbon::now();
        $fechaFin = $fechaInicio->copy()->addMonths(6);

        $temporada2 = $fechaFin->copy()->addDays(10);
        $temporada2Fin = $temporada2->copy()->addMonths(6);

        $temporada3 = $temporada2Fin->copy()->addDays(12); // Comienza un día después del fin de la temporada 1
        $temporada3Fin = $temporada3->copy()->addMonths(6);

        Season::create([
            'nombre' => 'Primera Temporada',
            'fecha_inicio' => '2000-01-01',
            'fecha_fin' => '2000-06-02',
            'status' => 0
        ]);
        Season::create([
            'nombre' => 'Segunda Temporada',
            'fecha_inicio' => '2000-05-12',
            'fecha_fin' => '2000-12-20',
            'status' => 0
        ]);

        Season::create([
            'nombre' => 'Tercera Temporada',
            'fecha_inicio' => '2010-02-05',
            'fecha_fin' => '2010-08-05',
            'status' => 0
        ]);
        Season::create([
            'nombre' => 'Relampago',
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin
        ]);

        Season::create([
            'nombre' => 'Temporada 2',
            'fecha_inicio' => $temporada2,
            'fecha_fin' => $temporada2Fin
        ]);

        Season::create([
            'nombre' => 'Temporada 3',
            'fecha_inicio' => $temporada3,
            'fecha_fin' => $temporada3Fin
        ]);
    }
}
