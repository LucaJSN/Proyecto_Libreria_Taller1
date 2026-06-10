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
            'url_imagen' => 'img/productos/el-psicoanalista-libro.jpg',
            'id_categoria' => 1, // Asegúrate de que esta categoría exista
        ]);

        Producto::create([
            'nombre' => 'Cien años de soledad',
            'descripcion' => 'La obra maestra de Gabriel García Márquez.',
            'precio' => 12000.00,
            'stock' => 5,
            'url_imagen' => 'img/3.jpg',
            'id_categoria' => 2,
        ]);

        // Puedes agregar un producto sin stock para probar el botón "Agotado"
        Producto::create([
            'nombre' => 'Diseño de Sistemas con Laravel',
            'descripcion' => 'Guía avanzada para desarrollo backend moderno.',
            'precio' => 22000.00,
            'stock' => 0, 
            'url_imagen' => 'img/productos/laravel-libro.jpg',
            'id_categoria' => 2,
        ]);

        Producto::create([
            'nombre' => 'Regla Flexible',
            'descripcion' => 'loremsaad asd asdasdfasdasdf as d fasdasdf asdasdf asdfasdf ',
            'precio' => 22000.00,
            'stock' => 0, 
            'url_imagen' => 'img/productos/regla-flexible.png',
            'id_categoria' => 1,
        ]);
    }
}