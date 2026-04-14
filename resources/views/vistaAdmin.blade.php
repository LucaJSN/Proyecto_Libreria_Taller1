@extends('layouts.app')

@section('content')
    <nav>
    @auth
        @if(auth()->user()->role === 'admin')
            {{-- Sección de Administración --}}
            <div class="row mt-5 py-5 bg-light rounded-3 text-center">
                <div class="col-12">
                    <h2 class="h4 mb-3">Acciones de Administrador</h2>
                    <a href="/productos/crear" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-plus-circle me-2"></i>Crear Nuevo Producto
                    </a>
                </div>
            </div>
                {{-- Listado de Productos --}}
            <div class="row g-4">
                @foreach($productos as $producto)
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-5"> {{-- mb-5 para separar cada producto entre sí --}}
                        <img class="me-4 mr-4" src="{{$producto->imagen}}" alt="{{$producto->nombre}}" 
                            style="width: 200px; height: 200px; object-fit: contain; flex-shrink: 0;">
                        
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-2">{{ $producto->nombre }}</h5>
                            
                            {{-- Añadimos mb-4 para empujar los botones hacia abajo --}}
                            <p class="text-muted mb-4" style="line-height: 1.6;">
                                {{ $producto->descripcion }}
                            </p>

                            {{-- Contenedor de botones con margen superior adicional por seguridad --}}
                            <div class="pt-3 border-top"> {{-- pt-3 es padding-top, y border-top crea una línea sutil --}}
                                <a class="btn btn-primary px-4 me-2 mr-2" href="#" role="button">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a class="btn btn-danger px-4" href="#" role="button">
                                    <i class="bi bi-trash"></i> Eliminar
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
        @else
            <h1>No autorizado a esta vista</h1>
        @endif
    </nav>
    @endauth
    @guest
        <div>
            <h1>Logueate como admin para poder ver esta vista</h1>
        </div>
    @endguest
@endsection