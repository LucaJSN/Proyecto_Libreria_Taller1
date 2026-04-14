@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
      <div class="col-md-4">
          {{-- Quitamos 'dropdown-menu' y usamos clases de tarjeta o padding --}}
          <div class="card p-4 shadow">
              <form action="/ingresar" method="POST">
                  @csrf {{-- token de seguridad! --}}

                  <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="name" name="name" class="form-control" id="name" placeholder="Name" notRequired>
                  </div>
                  
                  <div class="mb-3"> {{-- En Bootstrap 5 se usa mb-3 en lugar de form-group --}}
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" required>
                  </div>

                  <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  </div>

                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="remember">
                      <label class="form-check-label" for="remember">
                          Remember me
                      </label>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </form>
          </div>
      </div>
  </div>
@endsection