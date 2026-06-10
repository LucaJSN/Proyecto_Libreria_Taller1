@extends('layouts.app')

@section('content')
<div class="container py-5" id="consulta">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center">Contacto</h2>
                
                <form action="{{ route('/consulta') }}" method="POST" id="formConsulta">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombre y Apellido</label>
                        <input type="text" name="nombres" class="form-control" id="name" placeholder="Tu nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail" class="form-label">Correo Electrónico</label>
                        <input type="email" name="mail" class="form-control" id="email" placeholder="nombre@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" name="telefono" class="form-control" id="phone" placeholder="+54..." required>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea name="mensaje" class="form-control" id="message" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mb-3">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Esperamos a que TODO el HTML esté cargado en el navegadorSS
</script>
@endsection

