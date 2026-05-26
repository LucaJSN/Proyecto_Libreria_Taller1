<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['nombre' => 'admin'],
            ['nombre' => 'cliente']
        ];
        foreach ($roles as $rol){
            Rol::firstOrCreae(['nombre' => $rol['nombre'], $rol]);
        }
    }
}
