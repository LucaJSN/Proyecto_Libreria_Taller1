@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Producto</h2>

    <form action="{{ route('productos.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   name="nombre"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion"
                      class="form-control"
                      rows="4"
                      required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number"
                   name="precio"
                   step="0.01"
                   min="0"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number"
                   name="stock"
                   min="0"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file"
                   name="imagen"
                   class="form-control"
                   accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select name="id_categoria" class="form-select" required>
                <option value="">Seleccionar categoría</option>
                <!-- Opciones de categoría -->
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>

            <select name="activo" class="form-select">
                <option value="1" selected>Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Guardar Producto
        </button>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-secondary">
            Cancelar
        </a>

    </form>
</div>

@endsection