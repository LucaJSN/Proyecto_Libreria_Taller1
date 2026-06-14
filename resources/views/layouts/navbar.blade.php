<nav class="navbar navbar-dark navbar-expand-lg bg-dark" id="NB">
    <div class="container-fluid" id="navbar">
        <a class="navbar-brand" href="<?php echo('/')?>">
            <img src="{{ asset('img/punto-y-barra-blanco.png') }}" width="20px" height="20px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id="collapsingNavbar3"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('quienes-somos') ? 'active' : '' }}" href="{{ url('/quienes-somos') }}">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contacto') ? 'active' : '' }}" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('catalogo') ? 'active' : '' }}" href="{{ url('/catalogo') }}">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('comercializacion') ? 'active' : '' }}" href="{{ url('/comercializacion') }}">Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('terminos') ? 'active' : '' }}" href="{{ url('/terminos') }}">Terminos y Usos</a>
                </li>
                
                {{-- SOLO PARA ADMIN: Link al dashboard --}}
                @auth
                    @if(auth()->user()->rol_id == 1 || auth()->user()->role == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            Administración
                        </a>
                    </li>
                    @endif
                @endauth
            </ul>
            
            <div class="acciones-header d-flex align-items-center gap-3">
                @auth
                    {{-- Usuario logueado --}}
                    <div class="sesion-activa">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/punto-y-barra-usuarios-registrados.png') }}" width="20px" height="20px">
                            <span class="text-white ms-1">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Mis Compras</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

                @guest
                    {{-- Usuario no logueado --}}
                    <div class="botones-ingreso d-flex gap-2">
                        <a class="btn btn-outline-light btn-sm" href="{{ url('ingreso') }}">Iniciar Sesión</a>
                        <a class="btn btn-light btn-sm" href="{{ url('registro') }}">Registrarse</a>
                    </div>
                @endguest

                {{-- Carrito --}}
                <div class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('carrito') ? 'active' : '' }}" href="{{ url('/carrito') }}">
                        <i class="bi bi-cart3"></i>
                        <span>Carrito</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>