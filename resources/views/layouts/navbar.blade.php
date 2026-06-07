<nav class="navbar navbar-dark navbar-expand-lg bg-dark" id="NB">
        <div class="container-fluid" id="navbar">
            <a class="navbar-brand" href="<?php echo('/')?>">
                <img src="img/punto-y-barra-blanco.png" width="20px" height="20px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"  id="collapsingNavbar3"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
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
                    @auth
                    <!-- Solo se verá el link (btn admin) a esta vista para los administradores -->
                    @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/vistaAdmin">Administración</a>
                    </li>
                    @endif
                    @endauth
                </ul>
                <div class="acciones-header">
                @auth
                <div class=sesion-activa>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/punto-y-barra-usuarios-registrados.png" width="20px" height="20px">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" id="registrado">
                        <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Mis Pedidos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                            <button type="submit" class="btn btn-danger btn-sm nav-link border-0">
                                Cerrar Sesión {{ Auth::user()->name }}
                            </button>
                        </form>
                    </ul>
                    
                </div>
            @endauth
            @guest
                <div class="botones-ingreso">
                    <button type="submit" class="btn">
                        <a class="btn-footer" id="boton-ingreso" href="ingreso">Iniciar Sesión</a>
                    </button>
                    <button type="submit" class="btn">
                        <a class="btn-footer" href="/registro">Registrarse</a>
                    </button>
                </div>
                
            @endguest
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('carrito') ? 'active' : '' }}" 
                href="{{ url('/carrito') }}">

                    <i class="bi bi-cart3"></i>

                    <span>Carrito</span>

                </a>
            </div>
            </div>
        </div>    
    </div>
</nav>