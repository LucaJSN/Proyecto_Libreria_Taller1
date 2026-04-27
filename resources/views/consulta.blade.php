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

{{-- Esto es para el modal pero no funciona --}}
<script>
document.getElementById("formConsulta").addEventListener("submit", function(e) {
    e.preventDefault(); // 🚫 evita envío a Laravel

    if (this.checkValidity()) {
        // Mostrar modal de Bootstrap
        let modal = new bootstrap.Modal(document.getElementById('pagina_construccion'));
        modal.show();
    } else {
        this.reportValidity(); // muestra errores de required
    }
});
</script>
@endsection