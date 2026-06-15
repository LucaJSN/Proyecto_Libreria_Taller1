@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="mb-4">Panel de Administración</h1>

<div class="row g-4">

    <!-- Ventas -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h4 class="mb-0">Gestión de Ventas</h4>
            </div>
            @foreach($ventas->take(2) as $venta)

                <div class="card mb-3">

                    <div class="card-header">
                        Venta #{{ $venta->id }}
                    </div>

                    <div class="card-body">

                        <p>
                            <strong>Usuario:</strong>
                            {{ $venta->usuario->nombre }}
                        </p>

                        <p>
                            <strong>Total:</strong>
                            ${{ number_format($venta->total, 2) }}
                        </p>

                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($venta->detalles as $detalle)

                                    <tr>

                                        <td>
                                            {{ $detalle->producto->nombre }}
                                        </td>

                                        <td>
                                            {{ $detalle->cantidad }}
                                        </td>

                                        <td>
                                            ${{ number_format($detalle->precio_unitario, 2) }}
                                        </td>

                                        <td>
                                            ${{ number_format($detalle->subtotal, 2) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            @endforeach
            <a href="#"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#ventasModal" id="btn-edicion">
                Ver más
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h4 class="mb-0">🔥Top 5 Productos Más Vendidos🔥</h4>
            </div>

            <div class="card-body">

                @if($masVendidos->isEmpty())
                    <p>No hay ventas registradas.</p>
                @else

                    <ol class="list-group list-group-numbered">

                        @foreach($masVendidos as $item)

                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                {{ $item->producto->nombre }}

                                <span class="badge bg-primary rounded-pill">
                                    {{ $item->total_vendido }}🔥
                                </span>

                            </li>

                        @endforeach

                    </ol>

                @endif

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
                        <thead class="table-dark">
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
                    data-bs-target="#productosModal" id="btn-edicion">
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
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Mail</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($consultas as $consulta)
                            <tr>
                                <td>{{ $consulta->id }}</td>
                                <td>{{ $consulta->mail}}</td>
                                <td>
                                    <a href="{{ route('consultas.ver', $consulta->id) }}" class="btn btn-sm" id="btn-edicion">
                                        ver consulta
                                    </a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>

                </div>
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
                <p><strong>Total usuarios:</strong> {{ $todosUsuarios->count() }} </p>
                <p><strong>Administradores:</strong> {{ $todosUsuarios->where('rol_id', 1)->count() }} </p>
                <!-- Tabla de usuarios -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>
                                {{ $usuario->nombre }}
                                @if($usuario->id == auth()->id())
                                    <span class="badge bg-info ms-1">Tú</span>
                                @endif
                            </td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if($usuario->rol_id == 1)
                                    <span class="badge bg-danger">Administrador</span>
                                @else
                                    <span class="badge bg-secondary">Usuario</span>
                                @endif
                            </td>
                            <td>
                                @if($usuario->id != auth()->id())
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('usuarios.editar', $usuario->id) }}" 
                                            1|  class="btn btn-warning">
                                            Editar
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $usuario->id }}">
                                            Eliminar
                                        </button>
                                    </div>
                                    
                                    <!-- Modal de confirmación de eliminación -->
                                    <div class="modal fade" id="deleteModal{{ $usuario->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Confirmar Eliminación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro que deseas eliminar al usuario <strong>{{ $usuario->name }}</strong>?
                                                    <br>
                                                    <small class="text-muted">Esta acción no se puede deshacer.</small>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">---</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No hay usuarios registrados
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
                @if($todosUsuarios->count() > 3)
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usuariosModal" id="btn-edicion">
                    Ver más ({{ $todosUsuarios->count() - 10 }} restantes)
                </button>
            @endif
            </div>
        </div>
    </div>

</div>


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
                        @foreach($usuarios as $usuario)
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

<div class="modal fade"
    id="usuariosModal"
    tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Gestión de Usuarios
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if($usuario->rol_id == 1)
                                    <span class="badge bg-danger">Administrador</span>
                                @else
                                    <span class="badge bg-success">Usuario</span>
                                @endif
                                </td>

                                <td>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}"
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

<div class="modal fade"
    id="ventasModal"
    tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Gestión de Ventas
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($ventas as $venta)

                            <tr>

                                <td>{{ $venta->id }}</td>

                                <td>
                                    {{ $venta->usuario->nombre }}
                                </td>

                                <td>
                                    {{ $venta->fecha_venta }}
                                </td>

                                <td>
                                    ${{ number_format($venta->total, 2) }}
                                </td>

                                <td>

                                    <button
                                        class="btn btn-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detalleVenta{{ $venta->id }}">
                                        Ver detalle
                                    </button>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
@foreach($ventas as $venta)

<div class="modal fade"
    id="detalleVenta{{ $venta->id }}"
    tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Venta #{{ $venta->id }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <table class="table">

                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($venta->detalles as $detalle)

                            <tr>

                                <td>
                                    {{ $detalle->producto->nombre }}
                                </td>

                                <td>
                                    {{ $detalle->cantidad }}
                                </td>

                                <td>
                                    ${{ number_format($detalle->precio_unitario, 2) }}
                                </td>

                                <td>
                                    ${{ number_format($detalle->subtotal, 2) }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
@endforeach



@endsection