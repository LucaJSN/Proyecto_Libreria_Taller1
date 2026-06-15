@extends('layouts.app')

@section('title', 'Detalle de Consulta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">📄 Detalle de Consulta</h4>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
                        ← Volver
                    </a>
                </div>
                
                <div class="card-body">
                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Nombre y Apellido</label>
                        <div class="p-3 bg-light rounded border">
                            {{ $consulta->nombres }}
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Correo Electrónico</label>
                        <div class="p-3 bg-light rounded border">
                            {{ $consulta->mail }}
                        </div>
                    </div>
                    
                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Teléfono</label>
                        <div class="p-3 bg-light rounded border">
                            {{ $consulta->telefono }}
                        </div>
                    </div>
                    
                    <!-- Fecha -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Fecha de Envío</label>
                        <div class="p-3 bg-light rounded border">
                            {{ $consulta->created_at->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                    
                    <!-- Mensaje -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Mensaje</label>
                        <div class="p-3 bg-light rounded border" style="min-height: 150px; white-space: pre-wrap;">
                            {{ $consulta->mensaje }}
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="d-flex gap-2 mt-4">
                        
                        <button type="button" 
                                class="btn btn-danger flex-grow-1"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                            Eliminar consulta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro que deseas eliminar la consulta de <strong>{{ $consulta->nombres }}</strong>?
                <br>
                <small class="text-muted">Esta acción no se puede deshacer.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection