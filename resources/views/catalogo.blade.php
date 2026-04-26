@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Encabezado y Buscador --}}
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold">Nuestros Productos</h1>
            <p class="text-muted">Explora nuestra selección exclusiva</p>
        </div>
        <div class="col-md-6">
            <form class="d-flex shadow-sm">
                <input class="form-control me-2" type="search" placeholder="¿Qué estás buscando?" aria-label="Search">
                <button class="btn btn-dark" popovertarget="popup">Buscar</button>
                <div popover id="popup">
                    Página en construccion
                    <br>
                    <br>
                    <button popovertargetaction="hide">cerrar</button>
                </div>
            </form>
        </div>
    </div>

    <hr class="mb-5">

    {{-- Listado de Productos --}}
    <div class="row g-4">
        @foreach($productos as $producto)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="{{ $producto->imagen }}" class="card-img-top p-3" alt="{{ $producto->nombre }}" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        {{ Str::limit($producto->descripcion, 80) }}
                        <!-- //para que las descripciones largas no rompan el diseño. -->
                    </p>
                    <div class="d-grid mt-3">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-cart-plus me-2"></i>Comprar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .transition {
        transition: all 0.3s ease;
    }
</style>
@endsection