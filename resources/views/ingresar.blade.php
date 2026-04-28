@extends('layouts.app')

@section('content')
<div class="container py-5" id="ingresar">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4 border-0" style="border-radius: 15px;">
                <h2 class="mb-4 text-center fw-bold">Ingresar</h2>
                
                {{-- ID: formLogin para el script --}}
                <form id="formLogin">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="usuario@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="********" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Entrar</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
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
    });
</script>
@endsection