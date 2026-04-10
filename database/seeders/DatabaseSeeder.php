<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <--- ESTO ES LO QUE TE FALTA

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un Administrador
        User::create([
            'name' => 'Admin Luca',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin', // <--- Necesitaremos agregar esta columna luego
        ]);

        // Crear un Usuario Común
        User::create([
            'name' => 'Juan Perez',
            'email' => 'juan@test.com',
            'password' => Hash::make('user123'),
            'role' => 'comun',
        ]);
    }
}