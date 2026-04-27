@extends('layouts.app')

@section('content')
<div class="container py-5">
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
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="+54..." required>
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
    document.getElementById('formContacto').addEventListener('submit', function(event) {
        // 1. Evitamos que la página se recargue o envíe a una ruta (Evita el error de Symfony)
        event.preventDefault();

        // 2. Si llegamos aquí, es porque el navegador ya validó que el email tiene @ y que todo está lleno
        // 3. Llamamos al modal manualmente usando el ID que pusiste en el layout
        var miModal = new bootstrap.Modal(document.getElementById('pagina_construccion'));
        miModal.show();
    });
</script>
@endsection

