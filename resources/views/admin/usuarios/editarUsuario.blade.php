@extends('layouts.app')

@section('title', 'Editar Rol de Usuario')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"> Editar Rol de Usuario</h4>
                </div>
                
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Nombre del Usuario (solo lectura) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Nombre del Usuario</label>
                            <div class="p-3 bg-light rounded border">
                                {{ $usuario->nombre }}
                            </div>
                        </div>
                        
                        <!-- Email del Usuario (solo lectura) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Correo Electrónico</label>
                            <div class="p-3 bg-light rounded border">
                                {{ $usuario->email }}
                            </div>
                        </div>
                        
                        <!-- Rol Actual (solo lectura) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Rol Actual</label>
                            <div class="p-3 bg-light rounded border">
                                @if($usuario->rol_id == 1)
                                    <span class="badge bg-danger">Administrador</span>
                                @else
                                    <span class="badge bg-secondary">Usuario Normal</span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Selector de Nuevo Rol -->
                        <div class="mb-4">
                            <label for="rol_id" class="form-label fw-bold">
                                Nuevo Rol
                            </label>
                            <select name="rol_id" id="rol_id" class="form-select form-select-lg" required>
                                <option value="">-- Seleccionar Nuevo Rol --</option>
                                <option value="0" {{ $usuario->rol_id == 0 ? 'selected' : '' }}>
                                    Usuario Normal
                                </option>
                                <option value="1" {{ $usuario->rol_id == 1 ? 'selected' : '' }}>
                                    Administrador
                                </option>
                            </select>
                            <div class="form-text text-muted mt-2">
                                Los administradores tienen acceso total al panel de control.
                            </div>
                        </div>
                        
                        <!-- Botones de Acción -->
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                Actualizar Rol
                            </button>
                            
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary flex-grow-1">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection