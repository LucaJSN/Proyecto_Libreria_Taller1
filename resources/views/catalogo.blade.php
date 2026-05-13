@extends('layouts.app')

@section('content')
<div class="container py-5" id="catalogo">
    {{-- Encabezado y Buscador --}}
    <div class="row mb-5 align-items-center" id="cabecera-catalogo">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold">Nuestros Productos</h1>
            <p class="text-muted">Explora nuestra selección de articulos    </p>
        </div>
        <div class="col-md-6">
            <form class="d-flex shadow-sm">
                <input class="form-control me-2" type="search" placeholder="¿Qué estás buscando?" aria-label="Search">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Buscar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Error</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>La página a la que quiere acceder se encuentra en construcción</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr class="mb-5">

    {{-- Listado de Productos --}}
    {{-- Buscamos los productos --}}
    @php
        $productos = App\Models\Producto::all();
    @endphp
    <div class="row g-4">
        @foreach($productos  as $producto)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition" style="border-radius: 12px; overflow: hidden;">
                    <!-- Contenedor de imagen con fondo sutil para resaltar el producto -->
                    <div class="bg-light p-3 d-flex align-items-center justify-content-center" style="height: 200px;">
                        <img src="{{ asset($producto->url_imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}" style="max-height: 100%; object-fit: contain;">
                    </div>
                    
                    <div class="card-body d-flex flex-column p-4">
                        <!-- Categoría en la parte superior -->
                        <div class="mb-2">
                            <span class="badge bg-secondary-subtle text-secondary px-2 py-1 small fw-semibold" style="font-size: 0.75rem;">
                                {{ $producto->categoria->nombre }}
                            </span>
                        </div>

                        <!-- Título -->
                        <h5 class="card-title fw-bold text-dark mb-2 text-truncate" title="{{ $producto->nombre }}">
                            {{ $producto->nombre }}
                        </h5>
                        
                        <!-- Descripción -->
                        <p class="card-text text-muted small flex-grow-1 mb-3">
                            {{ Str::limit($producto->descripcion, 75) }}
                        </p>
                        
                        <!-- Fila de Precio y Stock (Contraste con Naranja Cálido) -->
                        <div class="d-flex align-items-baseline justify-content-between mb-3 pt-2 border-top">
                            <span class="fs-4 fw-extrabold" style="color: #f57c00; font-weight: 800;">
                                ${{ number_format($producto->precio, 2, ',', '.') }}
                            </span>
                            <span class="text-muted small">
                                Stock: <strong class="{{ $producto->stock > 0 ? 'text-success' : 'text-danger' }}">{{ $producto->stock }}</strong>
                            </span>
                        </div>
                        
                        <!-- Botón de Acción Azul -->
                        <div class="d-grid mt-auto">
                            <a href="#" class="btn btn-primary py-2 fw-semibold shadow-sm" style="background-color: #0d6efd; border-radius: 8px;">
                                <i class="bi bi-cart-plus me-2"></i>Agregar al carrito
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
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