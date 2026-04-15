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
                <h2>Donde encontrarnos</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.1055964934553!2d-58.7851455246145!3d-27.46597171654735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ae1f9f545a7%3A0x4480e6b34abd15ce!2sCampus%20Unne!5e0!3m2!1ses-419!2sar!4v1776297058801!5m2!1ses-419!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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