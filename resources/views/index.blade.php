@extends('layouts.app')

@section('content')
    <h1 class="titulo principal">Libreria</h1>
    <div>
        <h2 class="titulo secundario">Nuestros Productos</h2>
        <div class=seccion_productos>
            <div class="producto">
                <h3 class="precio_producto">$2000</h3>
                <img src="https://www.libreriaascorti.com.ar/147-large_default/lapiz-staedtler-noris-hb-2.jpg" alt="..." class="imagen_producto">
                <a href="" class="btn comprar_producto">comprar <a href=""></a></a>
                <a href="" class="btn agregar_carrito"><i class="fas fa-shopping-cart"></i></a>
                <p class="producto descripcion">Descripcion Generica Para el producto</p>
            </div>
            <div class="producto">
                <img src="https://www.libreriaascorti.com.ar/147-large_default/lapiz-staedtler-noris-hb-2.jpg" alt="..." class="imagen_producto">
                <a href="" class="btn comprar_producto">comprar</a>
                <p class="producto descripcion">Descripcion Generica Para el producto</p>
            </div>
            <div class="producto">
                <img src="https://www.libreriaascorti.com.ar/147-large_default/lapiz-staedtler-noris-hb-2.jpg" alt="..." class="imagen_producto">
                <a href="" class="btn comprar_producto">comprar</a>
                <p class="producto descripcion">Descripcion Generica Para el producto</p>
            </div>
            <div class="producto">
                <img src="https://www.libreriaascorti.com.ar/147-large_default/lapiz-staedtler-noris-hb-2.jpg" alt="..." class="imagen_producto">
                <a href="" class="btn comprar_producto">comprar</a>
                <p class="producto descripcion">Descripcion Generica Para el producto</p>
            </div>
            <div class="producto">
                <img src="https://www.libreriaascorti.com.ar/147-large_default/lapiz-staedtler-noris-hb-2.jpg" alt="..." class="imagen_producto">
                <a href="" class="btn comprar_producto">comprar</a>
                <p class="producto descripcion">Descripcion Generica Para el producto</p>
            </div>
            <div class="producto">
                <img src="https://www.libreriaascorti.com.ar/147-large_default/lapiz-staedtler-noris-hb-2.jpg" alt="..." class="imagen_producto">
                <a href="" class="btn comprar_producto">comprar</a>
                
                <p class="producto descripcion">Descripcion Generica Para el producto</p>
                
            </div>
        </div>

        <h2 class="titulo secundario">Quienes Somos?</h2>
        <a href="/extras">Ver extras</a>
        
    </div>
@endsection