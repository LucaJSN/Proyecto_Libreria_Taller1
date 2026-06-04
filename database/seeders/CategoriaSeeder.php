<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de cambiar los campos según las columnas reales de tu tabla
        Categoria::create([
            'nombre' => 'UTILES',
        ]);

        Categoria::create([
            'nombre' => 'LIBROS',
        ]);
    }
}