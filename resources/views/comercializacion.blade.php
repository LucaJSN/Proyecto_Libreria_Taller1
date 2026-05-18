@extends('layouts.app')

@section('content')
    <div class="seccion-comercializacion" id="comercializacion">
        <h1>Comercialización</h1>

        <h2 class="mb-5">Métodos de Pago</h2>
        <ul class="lista-pagos">
            <li class="metodo-pago tarjeta-pago">
                <h3>Paga en cuotas</h3>
                <img src="{{ asset('img/metodos-pago/logo-gocuotas.png') }}" alt="Mercado Pago" class="img-formato-unico">
                <div class="tarjetas">
                    <img src="{{ asset('img/metodos-pago/Mastercard-logo.png') }}"alt="Mastercard">
                    <img src="{{ asset('img/metodos-pago/visa.jpg') }}" alt="Visa">
                    <img src="{{ asset('img/metodos-pago/NaranjaX-logo.png') }}" alt="NaranjaX">
                </div>
                <p class="ubicacion-texto">Paga en cuotas de 3, 6 y hasta 12 cuotas sin interés</p>
            </li>

            <li class="metodo-pago tarjeta-pago">
                <h3>Tarjetas de crédito</h3>
                <div class="tarjetas">
                    <img src="{{ asset('img/metodos-pago/Mastercard-logo.png') }}"alt="Mastercard">
                    <img src="{{ asset('img/metodos-pago/visa.jpg') }}" alt="Visa">
                    <img src="{{ asset('img/metodos-pago/NaranjaX-logo.png') }}" alt="NaranjaX">
                </div>
            </li>

            <li class="metodo-pago tarjeta-pago">
                <h3>Tarjeta de débito</h3>
                <div class="tarjetas">
                    <img src="{{ asset('img/metodos-pago/mastercard-debito.png') }}" alt="Mastercard Debito">
                    <img src="{{ asset('img/metodos-pago/visa-debito.jpg') }}" alt="Visa debito">
                </div>
                <p class="ubicacion-texto">Podes hacer tu compra en un solo pago</p>
            </li>            
        </ul>

        <h2 class="mb-5">Métodos de Envío</h2>
        <div class="metodos-envio">
            <div class="metodo-envio">
                <h3>Envío a Domicilio</h3>
                <div class="envios">
                    <img src="{{ asset('img/metodos-envio/andreani.jpg') }}" alt="Retiro en sucursal" class="img-formato-unico">
                    <img src="{{ asset('img/metodos-envio/Correo-argentino.jpg') }}" alt="Retiro en sucursal" class="img-formato-unico">
                    <img src="{{ asset('img/metodos-envio/va_cargo_logo.jpg') }}" alt="Retiro en sucursal" class="img-formato-unico">
                </div>
                <p class="ubicacion-texto">Podés pedir que los envios lleguen hasta la puerta de tu casa o simplemente retirar desde alguno de los puntos de entrega disponibles</p>
            </div>
            <div class="metodos-envio metodo-envio">
                <h3>Retiro en Sucursal</h3>
                <img src="{{ asset('img/retiro-local.png')}}">
                <p class="ubicacion-texto">Campus Deodoro Roca <br> Av. Libertad 5470, CP 3400, en la ciudad de Corrientes, Argentina</p>
            </div>        
        </div>
        
        <div class="politca-envio">
            <h2 class="mb-5">Política de Envío</h2>
            <div class="tarjeta-politica">
                <h3>Nuestros términos</h3>
                <p>"En Punto y Barra", nos comprometemos a que tus productos lleguen de forma segura y en el menor tiempo posible. Una vez confirmado tu pago, nuestro equipo prepara tu pedido con dedicación en un plazo de 24 a 48 horas hábiles. Trabajamos con los correos más confiables del país para garantizar entregas en un margen de 3 a 7 días, manteniendo siempre la transparencia en el seguimiento de tu envío."</p>
            </div>
        </div>
    </div>
@endsection