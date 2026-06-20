<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioAdminSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['email' => 'admin@puntoybarra.com'],
            [
                'nombre' => 'Administrador',
                'email' => 'admin@puntoybarra.com',
                'password' => Hash::make('admin123'),
                'rol_id' => '1'
            ]
        );
    }
}