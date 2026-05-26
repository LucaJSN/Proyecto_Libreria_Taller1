@extends('layouts.app')

@section('content')
<div class="container py-5" id="ingresar">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4 border-0" style="border-radius: 15px;">
                <h2 class="mb-4 text-center fw-bold">Crear una cuenta nueva</h2>
                
                {{-- ID: formLogin para el script --}}
                <form action="{{ route('registro') }}" method="POST">
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

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Registrarse</button>
                </form>

                <p>¿Ya tienes cuenta?</p>
                <a href="<?php echo ('ingresar')?>">Inicia sesion aquí</a>
            </div>
        </div>
    </div>
</div>

<script>
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    
    password.addEventListener('input', function() {
        if(this.value.length < 8) {
            document.getElementById('passwordError').textContent = 
                '❌ La contraseña debe tener al menos 8 caracteres';
        } else {
            document.getElementById('passwordError').textContent = '✅';
        }
    });

    confirmPassword.addEventListener('input', function() {
            if(this.value !== password.value) {
                document.getElementById('confirmError').textContent = 
                    '❌ Las contraseñas no coinciden';
            } else {
                document.getElementById('confirmError').textContent = 'Las contraseñas coinciden';
            }
        });
    
/*
    // 1. Esperamos a que TODO el HTML esté cargado en el navegador
    document.addEventListener('DOMContentLoaded', function() {
        
        const form = document.getElementById('formLogin');
        
        if (form) {
            form.addEventListener('submit', function(event) {
                // 2. Frenamos el envío para evitar errores de Symfony
                event.preventDefault();

                // 3. Buscamos el elemento en el DOM
                const modalElement = document.getElementById('pagina_construccion');

                if (modalElement) {
                    // 4. Si lo encuentra, lo inicializamos y mostramos
                    const miModal = new bootstrap.Modal(modalElement);
                    miModal.show();
                } else {
                    // Si entra aquí es que el @ include fallo o el ID es distinto
                    console.error("DEBUG: El ID 'pagina_construccion' no existe en esta página.");
                    alert("El modal no se cargó. Revisa el código fuente con Ctrl+U.");
                }
            });
        }
    }); */
</script>
@endsection