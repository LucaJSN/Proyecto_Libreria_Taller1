<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title;?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/miestilo.css" >

    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo('/')?>">Navbar</a>
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
                    <li class="nav-item dropdown">
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Lapices</a></li>
                        <li><a class="dropdown-item" href="#">Cuadernos</a></li>
                        <li><a class="dropdown-item" href="#">Libros</a></li>
                    </ul>
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