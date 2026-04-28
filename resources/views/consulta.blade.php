@extends('layouts.app')

@section('content')
<div class="container py-5" id="consulta">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center">Contacto</h2>
                
                <form action="/consulta" method="POST" id="formConsulta">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre y Apellido</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="nombre@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="+54..." required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea name="message" class="form-control" id="message" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mb-3">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Esperamos a que TODO el HTML esté cargado en el navegador
    document.addEventListener('DOMContentLoaded', function() {
        
        const form = document.getElementById('formConsulta');
        
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

