@extends('layouts.app')

@section('content')
<div class="container py-5" id="miPerfil">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4 border-0" style="border-radius: 15px;">
                <h2 class="mb-4 text-center fw-bold">Mi Perfil</h2>
                
                {{-- Mensajes de éxito o error --}}
                @if(session('exito'))
                    <div class="alert alert-success">{{ session('exito') }}</div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                {{-- Datos personales (solo lectura) --}}
                <div class="mb-4 p-3 bg-light rounded">
                    <h5 class="fw-bold mb-3">Información personal</h5>
                    <div class="mb-2">
                        <strong>Nombre usuario:</strong> {{ Auth::user()->nombre }}
                    </div>
                    <div class="mb-2">
                        <strong>Email:</strong> {{ Auth::user()->email }}
                    </div>
                    <div class="mb-2">
                        <strong>Rol:</strong> {{ Auth::user()->rol_id == 2 ? 'Cliente' : 'Administrador' }}
                    </div>
                </div>

                {{-- Formulario para cambiar contraseña --}}
                <hr class="my-4">
                <h5 class="fw-bold mb-3">Cambiar contraseña</h5>
                
                <form id="cambiarPasswordForm" action="{{ route('perfil.cambiar-password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="password_actual" class="form-label">Contraseña actual</label>
                        <input type="password" class="form-control" id="password_actual" name="password_actual" placeholder="********" required>
                        @error('password_actual')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required minlength="8">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
                        <div class="error text-danger small" id="confirmError"></div>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Cambiar contraseña</button>
                </form>

                <div class="mt-3 text-center">
                    <a href="{{ route('index') }}" class="text-decoration-none">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('cambiarPasswordForm')?.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('password_confirmation').value;
        const confirmError = document.getElementById('confirmError');
        
        if (password !== confirm) {
            e.preventDefault();
            confirmError.textContent = 'Las contraseñas no coinciden';
            return false;
        }
        
        confirmError.textContent = '';
    });
</script>
@endpush