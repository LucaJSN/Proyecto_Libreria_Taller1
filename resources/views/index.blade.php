@extends('layouts.app')

@section('content')
<h1 class="titulo principal">Punto Y Barra | Librería</h1>
<div id="index">
  <h2 class="titulo secundario">Nuestros Productos</h2>
  <div class=seccion_productos>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/articulos-principal.jpg"  alt="banner artículos principales">
          </div>
          <div class="carousel-item">
            <img src="img/articulos-escolares.jpg"  alt="banner artículos escolares">
          </div>
          <div class="carousel-item">
            <img src="img/articulos-oficina.jpg"  alt="banner artículos oficina">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </div>
  <section class="seccion-productos py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0 fs-3">Novedades</h2>
            <a href="{{ route('productos.index') }}" class="btn btn-dark btn-sm">
                Ver más
            </a>
        </div>
{{-- Grid de productos --}}
  <div class="row g-4 producto-grid">
      @forelse($productos as $producto)
          <div class="col-md-6 col-lg-3">
              <div class="card h-100 shadow-sm border-0">
                  {{-- Imagen --}}
                  @if($producto->url_imagen)
                      <img src="{{ asset($producto->url_imagen) }}" 
                          class="card-img-top" 
                          alt="{{ $producto->nombre }}"
                          style="height: 200px; object-fit: cover;">
                  @else
                      <img src="{{ asset('img/producto-default.jpg') }}" 
                          class="card-img-top" 
                          alt="Sin imagen"
                          style="height: 200px; object-fit: cover;">
                  @endif
                  
                  {{-- Cuerpo de la tarjeta --}}
                  <div class="card-body d-flex flex-column">
                      <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                      <p class="card-text text-muted small">{{ Str::limit($producto->descripcion, 80) }}</p>
                      
                      {{-- Precio --}}
                      <p class="fw-bold text-dark fs-5 mb-1">${{ number_format($producto->precio, 2) }}</p>
                      
                      {{-- Stock --}}
                      <p class="small mb-3">
                          <strong>Stock:</strong> 
                          <span class="{{ $producto->stock > 0 ? 'text-dark' : 'text-secondary' }}">
                              {{ $producto->stock }}
                          </span>
                      </p>
                      
                      {{-- Botón según stock --}}
                      @if($producto->stock > 0)
                          <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="mt-auto">
                              @csrf
                              <button type="submit" class="btn btn-warning w-100">
                                  Agregar al carrito
                              </button>
                          </form>
                      @else
                          <button class="btn btn-secondary w-100" disabled>
                              Agotado
                          </button>
                      @endif
                  </div>
              </div>
          </div>
      @empty
          <div class="col-12">
              <p class="text-center text-muted">No hay productos disponibles.</p>
          </div>
      @endforelse
  </div>
</section>
<section class="seccion-cuotas py-5">
  <div class="conteiner">
    <img src="img/cuotas.jpg">
    
  </div>
</section>
<section>
  <div class="row g-4 producto-grid">
      @forelse($productosSinOrden as $producto)
          <div class="col-md-6 col-lg-3">
              <div class="card h-100 shadow-sm border-0">
                  {{-- Imagen --}}
                  @if($producto->url_imagen)
                      <img src="{{ asset($producto->url_imagen) }}" 
                          class="card-img-top" 
                          alt="{{ $producto->nombre }}"
                          style="height: 200px; object-fit: cover;">
                  @else
                      <img src="{{ asset('img/producto-default.jpg') }}" 
                          class="card-img-top" 
                          alt="Sin imagen"
                          style="height: 200px; object-fit: cover;">
                  @endif
                  
                  {{-- Cuerpo de la tarjeta --}}
                  <div class="card-body d-flex flex-column">
                      <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                      <p class="card-text text-muted small">{{ Str::limit($producto->descripcion, 80) }}</p>
                      
                      {{-- Precio --}}
                      <p class="fw-bold text-dark fs-5 mb-1">${{ number_format($producto->precio, 2) }}</p>
                      
                      {{-- Stock --}}
                      <p class="small mb-3">
                          <strong>Stock:</strong> 
                          <span class="{{ $producto->stock > 0 ? 'text-dark' : 'text-secondary' }}">
                              {{ $producto->stock }}
                          </span>
                      </p>
                      
                      {{-- Botón según stock --}}
                      @if($producto->stock > 0)
                          <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="mt-auto">
                              @csrf
                              <button type="submit" class="btn btn-warning w-100">
                                  Agregar al carrito
                              </button>
                          </form>
                      @else
                          <button class="btn btn-secondary w-100" disabled>
                              Agotado
                          </button>
                      @endif
                  </div>
              </div>
          </div>
      @empty
          <div class="col-12">
              <p class="text-center text-muted">No hay productos disponibles.</p>
          </div>
      @endforelse
  </div>
</section>
<section class="seccion-cuotas py-5">
  <div class="conteiner">
    <img src="img/envios.jpg">
  </div>
</section>
</div>
@endsection