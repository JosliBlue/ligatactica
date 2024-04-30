<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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
            'status' => false
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

        $faker = Faker::create();
        foreach (range(1, 11) as $index) {
            $fechaNacimiento = $faker->dateTimeBetween('-100 years', '-17 years')->format('Y-m-d');
            User::create([
                'nombre' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => $faker->randomElement(['ADMIN', 'PRESIDENT']),
                'date_birth' => $fechaNacimiento,
                'status' => $faker->boolean()
            ]);
        }
    }
}
