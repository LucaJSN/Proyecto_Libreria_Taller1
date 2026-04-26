@extends('layouts.app')

@section('content')
<div class="container py-5"> 
    <div class="seccion-comercializacion">
        <h1>Comercialización</h1>

        <h2 class="mb-5">Métodos de Pago</h2>
        <ul class="lista-pagos">
            <li class="metodo-pago">
                <h3>Paga con Mercado Pago</h3>
                <img src="{{ asset('img/metodo-de-pago.png') }}" alt="Mercado Pago" class="img-formato-unico">
            </li>
            <li class="metodo-pago">
                <h3>Paga con Tarjeta</h3>
                <img src="{{ asset('img/pago.png') }}" alt="Pago con tarjeta" class="img-formato-unico">
            </li>
        </ul>

        <h2 class="mb-5">Métodos de Envío</h2>
        <div class="contenedor-flex">
            <div class="tarjeta-metodo">
                <h3>Envío a Domicilio</h3>
                <img src="{{ asset('img/envio1.png') }}" alt="Envío a domicilio" class="img-formato-unico">
            </div>
            <div class="tarjeta-metodo">
                <h3>Retiro en Sucursal</h3>
                <img src="{{ asset('img/retiro-local.png') }}" alt="Retiro en sucursal" class="img-formato-unico">
                <p class="ubicacion-texto">Campus Deodoro Roca</p>
            </div>        
        </div>
        
        <div class="politca-envio">
            <h1 class="mb-5">Política de Envío</h1>
            <div class="tarjeta-politica">
                <h3>Nuestros términos</h3>
                <p>"En Punto y Barra", nos comprometemos a que tus productos lleguen de forma segura y en el menor tiempo posible. Una vez confirmado tu pago, nuestro equipo prepara tu pedido con dedicación en un plazo de 24 a 48 horas hábiles. Trabajamos con los correos más confiables del país para garantizar entregas en un margen de 3 a 7 días, manteniendo siempre la transparencia en el seguimiento de tu envío."</p>
            </div>
        </div>
    </div>
</div>
@endsection