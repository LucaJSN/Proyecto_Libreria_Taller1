@extends('layouts.app')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('content')
<div class="container py-5" id="ingresar">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4 border-0" style="border-radius: 15px;">
                <h2 class="mb-4 text-center fw-bold">Crear una cuenta nueva</h2>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ID: formLogin para el script --}}
                <form id="registroForm" action="{{ route('registro') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre usuario</label>
                        <input type="text" name='nombre' class="form-control" id="nombre" placeholder="usuario123" required>
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="usuario@ejemplo.com" 
                        required pattern="[^@]+@[^@]+\.[^@]+" name='email'
                        title="El email debe tener un punto después del @ (ejemplo: usuario@dominio.com)">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name='password'class="form-control" id="password" placeholder="********" required minlength="8">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirma la contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
                        <div class="error" id="confirmError"></div>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Registrarse</button>
                </form>

                <p>¿Ya tienes cuenta?</p>
                <a href="{{route ('ingreso')}}">Inicia sesion aquí</a>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('registroForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    const errorDiv = document.getElementById('confirmError');
    
    // Limpiar error anterior
    errorDiv.textContent = '';
    
    if (password !== confirmPassword) {
        e.preventDefault(); // Prevenir el envío del formulario
        errorDiv.textContent = '⚠️ Las contraseñas no coinciden';
        errorDiv.style.color = 'red';
        return false;
    }
    
    return true;
});

document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    
    // Verificá que los elementos existan antes de seguir
    if (!password || !confirmPassword) {
        console.error('No se encontraron los campos de contraseña');
        return;
    }
    
    password.addEventListener('input', function() {
        const passwordError = document.getElementById('passwordError');
        if (!passwordError) return;
        
        if(this.value.length < 8) {
            passwordError.textContent = '❌ La contraseña debe tener al menos 8 caracteres';
        } else {
            passwordError.textContent = '✅';
        }
    });

    confirmPassword.addEventListener('input', function() {
        const confirmError = document.getElementById('confirmError');
        if (!confirmError) return;
        
        if(this.value !== password.value) {
            confirmError.textContent = '❌ Las contraseñas no coinciden';
        } else {
            confirmError.textContent = '✅ Las contraseñas coinciden';
        }
    });
}); 
</script>
@endsection