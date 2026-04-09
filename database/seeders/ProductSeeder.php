<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Libro de Ejemplo',
            'descripcion' => 'Un libro de ejemplo para la librería.',
            'precio' => 19.99,
            'imagen' => 'ruta/a/la/imagen.jpg',
        ]);

        Producto::create([
            'nombre' => 'Otro Libro',
            'descripcion' => 'Otro libro de ejemplo para la librería.',
            'precio' => 29.99,
            'imagen' => 'ruta/a/otra/imagen.jpg',
        ]);
    }
}
