<!DOCTYPE html>

<head>
    <title>{{ $title ?? 'Mi Sitio' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/punto-y-barra.png">
    <link rel="stylesheet" href="{{ asset('/css/miestilo.css') }}">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="bg-dark navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo('/')?>">
                <img src="img/punto-y-barra-blanco.png" width="20px" height="20px">
            </a>
            <span class="navbar-brand mb-0 h1">Bienvenido {{ auth()->user()->nombre }} ?> </span>
        </div>
    </nav>
    <div class="row justify-content-center">
        <div class="col-6" id="tarjetas ventas">
            <div class="card">
                <div class="card-header">
                    <h3>Ventas</h3>
                </div>
                <div class="card-body">
                    <!--Datos de cada tabla-->
                    <!--<table>
                        <ul>

                        </ul> 
                    </table>-->
                </div>
            </div>
        </div>
        <div class="col-6" id="tarjetas productos">
            <div class="card">
                <div class="card-header">
                    <h3>Productos</h3>
                </div>
                <div class="card-body">
                    <!--Los últimos 10 productos de la tabla-->
                    <table>
                        <tbody>
                        <tr>
                            
                        </tr>
                        
                        <tr>
                            <td colspan="4" style="text-align: center;">No hay productos registrados</td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6" id="tarjetas Consultas">
            <div class="card">
                <div class="card-header">
                    <h3>Consultas</h3>
                </div>
                <div class="card-body">
                    <!--Datos de cada tabla-->
                    <table>
                        <!--Habría que guardar las consultas en alguna tabla-->
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6" id="tarjetas Consultas">
            <div class="card">
                <div class="card-header">
                    <h3>Usuarios</h3>
                </div>
                <div class="card-body">
                    <!--Datos de cada tabla-->
                    <table>
                        <!--Acá estaría los ultimos 10 usuarios-->
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
