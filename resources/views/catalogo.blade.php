@extends('layouts.app')

@section('content')
<div>
    <h1>Hola Mira los productos</h1>
    {{-- {{dd($productos) }} //prueba para ver si viene algo de la base --}}
    <container>
        <div class="card">
        <div class="card-body">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        @foreach($productos as $producto)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ $producto->imagen }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        @endforeach
        </div>
        </div>

    </container>
    <container>
        <h1>Crea productos</h1>
        <a href="/productos/crear" class="btn btn-primary">Crear Producto</a>
    </container>
</div>
@endsection