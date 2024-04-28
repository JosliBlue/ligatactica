<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Elias',
            'email' => 'elias@admin.com',
            'password' => Hash::make('admin1'),
            'role' => 'ADMIN',
            'date_birth' => '2003-02-05',
            'status' => true
        ]);
        User::create([
            'nombre' => 'Aracelly',
            'email' => 'arita@admin.xyz',
            'password' => Hash::make('admin2'),
            'role' => 'ADMIN',
            'date_birth' => '2002-11-26',
            'status' => true
        ]);

        User::create([
            'nombre' => 'Adolfo Lincon',
            'email' => 'abrolfo@presi.com',
            'password' => Hash::make('presi1'),
            'role' => 'PRESIDENT',
            'date_birth' => '1889-04-20',
            'status' => true
        ]);
        User::create([
            'nombre' => 'Bill Sukemberg',
            'email' => 'billsito@facebook.es',
            'password' => Hash::make('presi2'),
            'role' => 'PRESIDENT',
            'date_birth' => '1955-10-28',
            'status' => false
        ]);

        for ($i = 0; $i < 3; $i++) {
            User::create([
                'nombre' => Str::random(10), // Generate random name with 10 characters
                'email' => Str::random(12) . '@' . Str::random(8) . '.com', // Random email with unique domain
                'password' => Hash::make(Str::random(16)), // Secure random password with 16 characters
                'role' => rand(0, 1) === 0 ? 'ADMIN' : 'PRESIDENT', // Random role (ADMIN or PRESIDENT)
                'date_birth' => Carbon::now()->subYears(rand(18, 65))->format('Y-m-d'), // Random birthdate between 18-65 years ago
                'status' => rand(0, 1) === 0 ? true : false, // Random status (active or inactive)
            ]);
        }
        User::create([
            'nombre' => 'Elion Musk',
            'email' => 'Elionsito@x.com',
            'password' => Hash::make('admin3'),
            'role' => 'ADMIN',
            'date_birth' => '1955-10-28',
            'status' => false
        ]);
    }
}
