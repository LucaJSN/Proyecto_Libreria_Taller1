@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Administración de Productos</h2>

        <a href="{{ route('productos.create') }}" class="btn btn-success">
            Agregar Producto
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>

                    <td>
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                             width="60">
                    </td>

                    <td>{{ $producto->nombre }}</td>

                    <td>${{ number_format($producto->precio, 2) }}</td>

                    <td>
                        <a href="{{ route('productos.edit', $producto->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('productos.destroy', $producto->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este producto?')">
                                Eliminar
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection