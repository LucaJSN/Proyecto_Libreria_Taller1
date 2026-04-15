@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="contacto-wrapper">
        <div class="contacto-header">
            <h1>Contacto</h1>
            <p>Estamos aquí para ayudarte. Ponete en contacto con nosotros.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="contacto-card">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre y Apellido</label>
                                <input type="text" class="form-control custom-input" placeholder="Tu nombre">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control custom-input" placeholder="nombre@ejemplo.com">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control custom-input" placeholder="+54 000 000000">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Mensaje</label>
                            <textarea class="form-control custom-input" rows="4" placeholder="¿En qué podemos ayudarte?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-enviar w-100">Enviar Mensaje</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card">
                    <h3>Nuestras Redes</h3>
                    <p>Seguinos para enterarte de todas las novedades.</p>
                    
                    <div class="redes-lista">
                        <li>
                            <a href="#" class="red-link instagram">
                            <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </li>
                        <li>
                            <a href="#" class="red-link facebook">
                            <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="red-link whatsapp">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </li>
                        <li>
                            <a href="#" class="red-link tiktok">
                            <i class="fab fa-tiktok"></i> TikTok
                            </a>
                        </li>
                    </div>

                    <hr>

                    <div class="contacto-directo">
                        <p><i class="fas fa-map-marker-alt"></i> Campus Deodoro Roca</p>
                        <p><i class="fas fa-envelope"></i> contacto@puntoybarra.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection