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
            'role' => 'ADMIN',
            'date_birth' => '2002-02-05',
            'status' => true
        ]);
        User::create([
            'nombre' => 'Admin xd xd',
            'email' => 'admin@youtube.com',
            'password' => Hash::make('admin1'),
            'role' => 'ADMIN',
            'date_birth' => '2010-01-02',
            'status' => false
        ]);

        User::create([
            'nombre' => 'Presisito',
            'email' => 'presi@presi.com',
            'password' => Hash::make('presi1'),
            'role' => 'PRESIDENT',
            'date_birth' => '2002-02-04',
            'status' => true
        ]);
        User::create([
            'nombre' => 'Usuario Presi xd',
            'email' => 'presidente@yahoo.xyz',
            'password' => Hash::make('xdd'),
            'role' => 'PRESIDENT',
            'date_birth' => '2000-01-01',
            'status' => false
        ]);
    }
}
