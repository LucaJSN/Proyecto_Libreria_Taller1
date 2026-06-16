<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'El Principito',
                'descripcion' => 'Clásico de Antoine de Saint-Exupéry.',
                'id_categoria' => 1,
                'precio' => 12500,
                'stock' => 20,
                'url_imagen' => 'img/productos/1781621772_images.jpg',
                'activo' => true
            ],
            [
                'nombre' => '1984',
                'descripcion' => 'Novela distópica de George Orwell.',
                'id_categoria' => 1,
                'precio' => 15800,
                'stock' => 15,
                'url_imagen' => 'img/productos/1781621800_images (1).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Don Quijote de la Mancha',
                'descripcion' => 'Obra maestra de Cervantes.',
                'id_categoria' => 1,
                'precio' => 22000,
                'stock' => 8,
                'url_imagen' => 'img/productos/1781621846_images (2).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Cien Años de Soledad',
                'descripcion' => 'Gabriel García Márquez.',
                'id_categoria' => 1,
                'precio' => 19500,
                'stock' => 12,
                'url_imagen' => 'img/productos/1781621872_9788466379717.jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Rayuela',
                'descripcion' => 'Julio Cortázar.',
                'id_categoria' => 1,
                'precio' => 18000,
                'stock' => 10,
                'url_imagen' => 'img/productos/1781621936_images (3).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Clean Code',
                'descripcion' => 'Buenas prácticas de programación.',
                'id_categoria' => 1,
                'precio' => 35000,
                'stock' => 7,
                'url_imagen' => 'img/productos/1781622043_images (4).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Código Limpio para Principiantes',
                'descripcion' => 'Introducción al desarrollo profesional.',
                'id_categoria' => 1,
                'precio' => 28000,
                'stock' => 11,
                'url_imagen' => 'img/productos/1781622144_images (5).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Laravel desde Cero',
                'descripcion' => 'Guía práctica de Laravel.',
                'id_categoria' => 1,
                'precio' => 31000,
                'stock' => 14,
                'url_imagen' => 'img/productos/1781622182_71NyfK7OmtL._UF1000,1000_QL80_.jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Cuaderno Universitario 80 Hojas',
                'descripcion' => 'Cuaderno rayado de 80 hojas.',
                'id_categoria' => 2,
                'precio' => 4200,
                'stock' => 50,
                'url_imagen' => 'img/productos/1781622211_DEEzLr_67ec3a0926ad0_large.jpg',
                'activo' => true
            ],

            [
                'nombre' => 'Lápiz Negro HB',
                'descripcion' => 'Lápiz de grafito para escritura y dibujo.',
                'id_categoria' => 2,
                'precio' => 800,
                'stock' => 100,
                'url_imagen' => 'img/productos/1781622275_IMG_3790-scaled-1.jpg',
                'activo' => true
            ],

            [
                'nombre' => 'Resaltador Fluorescente',
                'descripcion' => 'Resaltador de tinta fluorescente.',
                'id_categoria' => 2,
                'precio' => 1500,
                'stock' => 60,
                'url_imagen' => 'img/productos/1781622318_images (6).jpg',
                'activo' => true
            ],

            [
                'nombre' => 'Abrochadora Metálica',
                'descripcion' => 'Abrochadora de escritorio resistente.',
                'id_categoria' => 3,
                'precio' => 7500,
                'stock' => 15,
                'url_imagen' => 'img/productos/1781622358_images (7).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Introducción a Bases de Datos',
                'descripcion' => 'Modelo relacional y SQL.',
                'id_categoria' => 1,
                'precio' => 26000,
                'stock' => 15,
                'url_imagen' => 'img/productos/1781622398_9789876151368.png',
                'activo' => true
            ],
            [
                'nombre' => 'Ingeniería de Software',
                'descripcion' => 'Metodologías y desarrollo.',
                'id_categoria' => 1,
                'precio' => 34000,
                'stock' => 10,
                'url_imagen' => 'img/productos/1781622446_images (8).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'SCRUM en la Práctica',
                'descripcion' => 'Gestión ágil de proyectos.',
                'id_categoria' => 1,
                'precio' => 21500,
                'stock' => 19,
                'url_imagen' => 'img/productos/1781622484_images (9).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Matemática Discreta',
                'descripcion' => 'Lógica y teoría de conjuntos.',
                'id_categoria' => 1,
                'precio' => 28500,
                'stock' => 12,
                'url_imagen' => 'img/productos/1781622517_TAPAMATEM.jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Lógica de Predicados',
                'descripcion' => 'Fundamentos formales.',
                'id_categoria' => 1,
                'precio' => 19000,
                'stock' => 17,
                'url_imagen' => 'img/productos/1781622553_images (10).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Inteligencia Artificial Moderna',
                'descripcion' => 'Conceptos y aplicaciones.',
                'id_categoria' => 1,
                'precio' => 39000,
                'stock' => 8,
                'url_imagen' => 'img/productos/1781622619_00100_0000008960_19013.jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Python para Ciencia de Datos',
                'descripcion' => 'Análisis y visualización.',
                'id_categoria' => 1,
                'precio' => 36500,
                'stock' => 11,
                'url_imagen' => 'img/productos/1781622675_images (11).jpg',
                'activo' => true
            ],
            [
                'nombre' => 'Manual de Linux',
                'descripcion' => 'Administración de sistemas.',
                'id_categoria' => 1,
                'precio' => 25000,
                'stock' => 14,
                'url_imagen' => 'img/productos/1781622713_images (12).jpg',
                'activo' => true
            ]
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}