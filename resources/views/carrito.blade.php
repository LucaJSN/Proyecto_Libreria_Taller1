@extends('layouts.app')


@section('content')
<div class="container py-5">

    <h1 class="mb-4 fw-bold">Mi carrito</h1>

    <div class="row g-4">
    
        <!-- Productos -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 p-4">

                <!-- Producto -->
                 @if($itemsCarrito->count() > 0)
                 <form action="{{ route('carrito.vaciar') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres vaciar el carrito completamente?');">
                    @csrf
                    @method('DELETE') {{-- Simula una petición DELETE --}}
                    
                    <button type="submit" class="btn btn-outline-dark btn-sm d-flex align-items-center" style="border-radius: 6px;">
                        <i class="bi bi-trash me-1"></i> Vaciar Carrito
                    </button>
                </form>
                @endif

                @forelse($itemsCarrito as $items)
                <div class="row align-items-center mb-4">

                    <div class="col-md-2 text-center">
                        <img src="{{ asset($items->producto->url_imagen) }}" alt="{{ $items->producto->nombre }}" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                    </div>

                    <div class="col-md-5">
                        <h5 class="fw-semibold mb-2">
                            {{ $items->producto->nombre }}
                        </h5>

                        <form action="{{ route('carrito.eliminar', $items->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que querés eliminar este producto del carrito?');">
                            @csrf
                            @method('DELETE') {{-- Simula una petición DELETE --}}
                            
                            <button type="submit" class="btn btn-outline-dark btn-sm d-flex align-items-center" style="border-radius: 6px;">
                                <i class="bi bi-trash me-1"></i> Eliminar
                            </button>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center border rounded overflow-hidden">

                            <button class="btn btn-light rounded-0 px-3">
                                -
                            </button>

                            <span class="px-4 fw-semibold">
                                {{ $items->cantidad }}
                            </span>

                            <button class="btn btn-light rounded-0 px-3">
                                +
                            </button>

                        </div>
                    </div>

                    <div class="col-md-2 text-end">
                        <h5 class="fw-bold mb-0">
                            {{ $items->producto->precio }}
                        </h5>
                    </div>

                </div>
                @empty
                    <p class="text-muted">Tu carrito está vacío.</p>
                @endforelse

                <hr>

            </div>

        </div>

        <!-- Resumen -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top">

                <h3 class="fw-bold mb-4">
                    Resumen
                </h3>

                <div class="d-flex justify-content-between mb-3">
                    <span>Productos</span>
                    <span>{{ $itemsCarrito->sum('cantidad') }}</span>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>Subtotal</span>
                    <span>${{ $total }}</span>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <span>Envío</span>
                    <span>Gratis</span>
                </div>

                <hr>
                @php
                    $total = 0;
                    foreach($itemsCarrito as $item) {
                        $total += $item->producto->precio * $item->cantidad;
                    }
                @endphp
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Total</h4>
                    <h4 class="fw-bold mb-0">${{$total}}</h4>
                </div>

                @if($itemsCarrito->count() > 0)
                    @auth
                    <form action="{{ route('carrito.confirmar') }}" method="POST" class="text-end mt-4">
                        @csrf
                        <button type="submit" class="btn btn-dark w-100 py-3 rounded-3 mb-3" style="border-radius: 8px;">
                            <i class="bi bi-check-circle me-2"></i>Confirmar Compra
                        </button>
                    </form>
                    @endauth
                @endif

                <a class="btn btn-outline-dark w-100 py-3 rounded-3" href="/catalogo">
                    Seguir comprando
                </a>

            </div>

        </div>

    </div>

</div>
@endsection