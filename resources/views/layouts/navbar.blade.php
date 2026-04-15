<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo('/');?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre-mi">Quienes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('contacto');?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalogo">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comercializacion">Comercialización</a>
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
            </div>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm nav-link border-0">
                        Cerrar Sesión ({{ Auth::user()->name }})
                    </button>
                </form>
            @endauth
            @guest
                <button type="submit" class="btn btn-dark"">
                        <a href="/ingresar">Iniciar Sesión</a>
                </button>
            @endguest
        </div>
    </nav>