@extends('layouts.app')

@section('content')

<div class="container">

```
<h2 class="mb-4">Panel de Administración</h2>

<div class="row g-4">

    <!-- Ventas -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h4 class="mb-0">Gestión de Ventas</h4>
            </div>

            <div class="card-body">
                <p><strong>Ventas hoy:</strong> --</p>
                <p><strong>Pendientes:</strong> --</p>

                <a href="#" class="btn btn-primary">
                    Ver más
                </a>
            </div>
        </div>
    </div>

    <!-- Productos -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Productos</h4>

                <a href="{{ route('productos.create') }}"
                    class="btn btn-success btn-sm">
                    Agregar
                </a>
            </div>

            <div class="card-body">

                <p>
                    <strong>Total de productos:</strong>
                    {{ count($productos) }}
                </p>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($productos->take(3) as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>

                                    <td>{{ $producto->nombre }}</td>

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

                <a href="#" class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#productosModal">
                        Ver todos los productos
                    </a>

            </div>
        </div>
    </div>

    <!-- Consultas -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h4 class="mb-0">Consultas</h4>
            </div>

            <div class="card-body">
                <p><strong>Sin responder:</strong> --</p>
                <p><strong>Respondidas:</strong> --</p>

                <a href="#" class="btn btn-primary">
                    Ver más
                </a>
            </div>
        </div>
    </div>

    <!-- Usuarios -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h4 class="mb-0">Usuarios Registrados</h4>
            </div>

            <div class="card-body">
                <p><strong>Total usuarios:</strong> --</p>
                <p><strong>Administradores:</strong> --</p>

                <a href="#" class="btn btn-primary">
                    Ver más
                </a>
            </div>
        </div>
    </div>

</div>
```

</div>
<!-- Modal de gestion de productos-->
<div class="modal fade"
     id="productosModal"
     tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Gestión de Productos
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <a href="{{ route('productos.create') }}"
                    class="btn btn-success mb-3">
                    Agregar Producto
                </a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>${{ $producto->precio }}</td>
                                <td>{{ $producto->stock }}</td>

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
                                                class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
@endsection
