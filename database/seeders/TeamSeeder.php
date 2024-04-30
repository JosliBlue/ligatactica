<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'nombre' => 'equipoLincon',
            'url_foto' => 'equipoLincon_20240430161145.png',
            'user_id' => 3 // referencia a adolfo lincon
        ]);
        Team::create([
            'nombre' => 'LA FLSMDFR',
            'url_foto' => 'Equipo serio_20240430145903.png',
            'user_id' => 7 // referencia a adolfo lincon
        ]);
        Team::create([
            'nombre' => 'Equipito',
            'url_foto' => 'Ortiga_20240430150804.png',
            'user_id' => 2 // referencia a adolfo lincon
        ]);
    }
}
