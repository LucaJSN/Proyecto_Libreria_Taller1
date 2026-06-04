@extends('layouts.app')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@section('content')
<div class="container py-5" id="ingresar">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4 border-0" style="border-radius: 15px;">
                <h2 class="mb-4 text-center fw-bold">Ingresar</h2>
                
                <form action="{{ route('ingreso') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-control">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="usuario@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-control">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="********" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Entrar</button>
                </form>

                <p>¿No tienes cuenta?</p>
                <a href="{{ route('registro') }}">Registrate Aquí</a>
            </div>
        </div>
    </div>
</div>

@endsection