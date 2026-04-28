@extends('layouts.app')

@section('content')
<div class="container py-5" id="catalogo">
    {{-- Encabezado y Buscador --}}
    <div class="row mb-5 align-items-center">
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
    <div class="row g-4">
        {{-- @foreach($productos as $producto)
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
                        <!-- <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-cart-plus me-2"></i>Comprar
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach --}}
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/1.jpg" class="card-img-top p-3" alt="Carpeta A4" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Carpeta A4</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Una carpeta de tamaño A4 con 100 páginas, ideal para organizar documentos o para uso escolar. Su diseño clásico y versátil lo convierte en el compañero perfecto para cualquier ocasión.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/2.jpg" class="card-img-top p-3" alt="Regla Blanda" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Regla Blanda</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Marca Maped, una regla flexible de 30 cm, perfecta para medir y dibujar líneas curvas. Su diseño duradero y resistente la convierte en una herramienta esencial para estudiantes y profesionales por igual.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/3.jpg" class="card-img-top p-3" alt="Transportador" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Transportador</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Un transportador de plástico con 180 grados, ideal para dibujar ángulos y líneas rectas. Su diseño ergonómico y resistente lo convierte en una herramienta esencial para estudiantes y profesionales por igual.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/4.jpg" class="card-img-top p-3" alt="Microfibras" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Microfibras</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Microfibras de colores surtidos, perfectas para escribir, dibujar y resaltar. Su diseño ergonómico y tinta de alta calidad las convierte en una herramienta esencial para estudiantes y profesionales por igual.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/5.jpg" class="card-img-top p-3" alt="Calculadora CT-806" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Calculadora CT-806</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Una calculadora infantil de 8 dígitos, ideal para realizar operaciones matemáticas básicas. Su diseño compacto y fácil de usar la convierte en una herramienta esencial para estudiantes infantiles
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/6.jpg" class="card-img-top p-3" alt="Mochila" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Mochila</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Mochila estilo "mini bag", para chicas.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/7.jpg" class="card-img-top p-3" alt="Cuaderno Inteligente" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Cuaderno Inteligente</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Cuaderno A4 Clasico, con 100 páginas, ideal para tomar notas diarias o para uso escolar. Su diseño clásico y versátil lo convierte en el compañero perfecto para cualquier ocasión.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <img src="img/Libro-normal.jpg" class="card-img-top p-3" alt="Libro Normal" style="height: 200px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Libro Normal</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        Un libro de tapa blanda con 100 páginas, ideal para tomar notas diarias o para uso escolar. Su diseño clásico y versátil lo convierte en el compañero perfecto para cualquier ocasión.
                    </p>
                </div>
            </div>
        </div>
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