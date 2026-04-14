@extends('layouts.app')

@section('content')
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre del libro" class="form-control mb-2">
        <textarea name="descripcion" class="form-control mb-2"></textarea>
        <input type="number" name="precio" step="0.01" class="form-control mb-2">
        <input type="file" name="imagen" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </form>
@endsection