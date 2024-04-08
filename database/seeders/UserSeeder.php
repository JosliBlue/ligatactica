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
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1'),
            'rol' => 'ADMIN'
        ]);

        User::create([
            'nombre' => 'Presisito',
            'email' => 'presi@presi.com',
            'password' => Hash::make('presi1'),
            'rol' => 'PRESIDENT'
        ]);
    }
}
