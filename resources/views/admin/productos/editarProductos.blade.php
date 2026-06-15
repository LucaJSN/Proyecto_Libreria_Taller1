@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark" id="edicion">
                    <h3 class="mb-0">Editar Producto</h3>
                </div>
                <div class="card-body">
                    {{-- Mostrar errores de validación --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulario de edición --}}
                    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                id="nombre" 
                                name="nombre" 
                                value="{{ old('nombre', $producto->nombre) }}" 
                                required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" 
                                    step="0.01" 
                                    class="form-control @error('precio') is-invalid @enderror" 
                                    id="precio" 
                                    name="precio" 
                                    value="{{ old('precio', $producto->precio) }}" 
                                    required>
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" 
                                    class="form-control @error('stock') is-invalid @enderror" 
                                    id="stock" 
                                    name="stock" 
                                    value="{{ old('stock', $producto->stock) }}" 
                                    required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                        id="descripcion" 
                                        name="descripcion" 
                                        rows="4">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Imagen Actual:</label>
                            @if($producto->url_imagen)
                                <div>
                                    <img src="{{ asset($producto->url_imagen) }}" 
                                        alt="{{ $producto->nombre }}" 
                                        width="150" 
                                        class="img-thumbnail">
                                </div>
                            @else
                                <p>Sin imagen</p>
                            @endif
                        </div>
                            <label for="nueva_imagen" class="form-label">Cambiar Imagen (opcional)</label>
                            <input type="file" 
                                    class="form-control @error('imagen') is-invalid @enderror" 
                                    id="nueva_imagen" 
                                    name="imagen" 
                                    accept="image/*">
                            <small class="text-muted">Formatos permitidos: JPG, PNG, JPEG. Máx 2MB</small>
                            @error('imagen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" id="btn-edicion" class="btn">
                                Actualizar Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection