@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
      {{-- <div class="col-md-4"> --}}
          <div class="card p-4 shadow" id="ingresar-card">
              <form action="/ingresar" method="POST">
                  @csrf {{-- token de seguridad! --}}

                  <div class="mb-3">
                      <label for="name" class="form-label">Nombre</label>
                      <input type="name" name="name" class="form-control" id="name" placeholder="Nombre" notRequired>
                  </div>
                  
                  <div class="mb-3"> {{-- En Bootstrap 5 se usa mb-3 en lugar de form-group --}}
                      <label for="email" class="form-label">Correo Electronico</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="email@ejemplo.com" required>
                  </div>

                  <div class="mb-3">
                      <label for="password" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña " required>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Ingresar</button>
              </form>
          </div>
      {{-- </div> --}}
  </div>
@endsection