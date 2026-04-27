<nav class="navbar navbar-expand-lg bg-body-tertiary" id="NB">
        <div class="container-fluid" id="navbar">
            <a class="navbar-brand" href="<?php echo('/')?>">
                <img src="img/punto-y-barra-blanco.png" width="20px" height="20px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('/');?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('quienes-somos');?>">Quienes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('contacto');?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('catalogo');?>">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('comercializacion');?>">Comercialización</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo('terminos');?>">Terminos y Usos</a>
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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
                @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm nav-link border-0">
                        Cerrar Sesión ({{ Auth::user()->name }})
                    </button>
                </form>
            @endauth
            @guest
                <button type="submit" class="btn btn-dark">
                        <a href="/ingresar">Iniciar Sesión</a>
                </button>
            @endguest
            </div>
        </div>
</nav>