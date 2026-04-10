@extends('layouts.app')

@section('content')
    <nav>
        <a href="/perfil">Mi Perfil</a>

        @if(auth()->user()->role === 'admin')
            <a href="/admin/configuracion" class="btn btn-danger">Configuración Global</a>
            <button>Eliminar Usuarios</button>
        @endif

        @if(auth()->user()->role === 'user')
            <a href="/mis-turnos">Mis Citas Médicas</a>
        @endif
    </nav>
@endsection