<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de cambiar los campos según las columnas reales de tu tabla
        Producto::create([
            'nombre' => 'El Psicoanalista',
            'descripcion' => 'Un thriller psicológico fascinante de John Katzenbach.',
            'precio' => 15500.00,
            'stock' => 10,
            'url_imagen' => 'images/libro-psicoanalista.jpg',
            'id_categoria' => 1, // Asegúrate de que esta categoría exista
        ]);

        Producto::create([
            'nombre' => 'Cien años de soledad',
            'descripcion' => 'La obra maestra de Gabriel García Márquez.',
            'precio' => 12000.00,
            'stock' => 5,
            'url_imagen' => 'images/cien-anos-soledad.jpg',
            'id_categoria' => 1,
        ]);

        // Puedes agregar un producto sin stock para probar el botón "Agotado"
        Producto::create([
            'nombre' => 'Diseño de Sistemas con Laravel',
            'descripcion' => 'Guía avanzada para desarrollo backend moderno.',
            'precio' => 22000.00,
            'stock' => 0, 
            'url_imagen' => 'images/laravel-book.jpg',
            'id_categoria' => 2,
        ]);
    }
}