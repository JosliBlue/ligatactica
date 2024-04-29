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
            'url_foto' => 'cubequipo_20240428135152.png',
            'user_id' => 3 // referencia a adolfo lincon
        ]);
        Team::create([
            'nombre' => 'LA FLSMDFR',
            'url_foto' => '',
            'user_id' => 7 // referencia a adolfo lincon
        ]);
        Team::create([
            'nombre' => 'Equipito',
            'url_foto' => '',
            'user_id' => 2 // referencia a adolfo lincon
        ]);
    }
}
