<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Adminsito',
            'correo' => 'admin@admin.com',
            'clave' => Hash::make('admin1'),
            'rol' => 'ADMIN'
        ]);

        User::create([
            'nombre' => 'Presisito',
            'correo' => 'presi@presi.com',
            'clave' => Hash::make('presi1'),
            'rol' => 'PRESIDENT'
        ]);
    }
}
