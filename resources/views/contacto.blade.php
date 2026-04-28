@extends('layouts.app')

@section('content')
<div class="contacto-container" id="contacto">
        {{-- <div> --}}
            <div class="contacto-header">
                <h1>Contacto</h1>
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
                            <a href="https://www.instagram.com" class="red-link instagram">
                            <img src="img/instagram.png">
                            </a>
                            <a href="https://www.facebook.com/" class="red-link facebook">
                            <img src="img/facebook.png">
                            </a>
                            <a href="https://api.whatsapp.com" class="red-link whatsapp">
                            <img src="img/whatsapp.png">
                            </a>
                            <a href="https://www.tiktok.com/es-419/ class="red-link tiktok">
                            <img src="img/tik-tok.png">
                            </a>
                        </div>

                        <hr>

                        <div class="contacto-directo">
                            <h3>Contacto Directo</h3>
                            <p><i class="fas fa-map-marker-alt"></i> Campus Deodoro Roca</p>
                            <p><i class="fas fa-envelope"></i> contacto@puntoybarra.com</p>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection