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
    }
}
