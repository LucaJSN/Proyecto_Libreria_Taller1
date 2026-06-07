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

        $this->call([
            CategoriaSeeder::class,
        ]); 

        $this->call([
            // CategoriaSeeder::class, (si tienes uno, ponlo primero)
            ProductoSeeder::class,
        ]); 

        $this->call([
            RolesSeeder::class,
        ]);
    }
}