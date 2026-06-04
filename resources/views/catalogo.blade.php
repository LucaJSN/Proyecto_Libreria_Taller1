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
            <!-- Buscador de Productos -->
            <form method="GET" class="d-flex shadow-sm">
                <input class="form-control me-2" type="text" name="buscar" placeholder="¿Qué estás buscando?" value="{{ $busqueda ?? ''}}" aria-label="Search">
                    <button type="submit" class="btn btn-secondary">
                        Buscar
                    </button>
            </form>
        </div>
    </div>

    <hr class="mb-5">

    {{-- Listado de Productos --}}
    {{-- Buscamos los productos --}}
    <div class="row g-4">
        @forelse($productos as $producto)
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
                            @if($producto->stock > 0)
                                <form action="{{ route('carrito.agregar') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                    <input type="hidden" name="cantidad" value="1">
                                    
                                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold shadow-sm" style="background-color: #0d6efd; border-radius: 8px;">
                                        <i class="bi bi-cart-plus me-2"></i>Agregar al carrito
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-secondary py-2 fw-semibold" disabled style="border-radius: 8px;">
                                    Agotado
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty

            <p>No hay productos para mostrar</p>

        @endforelse
        <div class="mt-5 d-flex justify-content-center">
            {{ $productos->links() }}
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