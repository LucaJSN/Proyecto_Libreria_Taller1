<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConsultasController;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VentaController;

Route::get('/', [ProductController::class, 'inicio'])->name('index');

/*
Route::get('/sobre-mi', function() {
    return view('sobre_mi', ['title' => 'Libreria | Sobre Mí']);
});
*/
Route::get('/contacto', function(){
    return view('contacto', ['title' => 'Punto y Barra | Contacto']);
});


Route::get('/quienes-somos', function(){
    return view('quienes-somos', ['title' => 'Punto y Barra | Quienes Somos']);
});

Route::get('/consulta', function(){
    return view('consulta', ['title' => 'Punto y Barra | Consulta']);
});


Route::get('/comercializacion', function() {
    return view('comercializacion', ['title' => 'Punto y Barra | Comercialización']);
});


//Modificación para agregar busqueda de productos
Route::get('/catalogo', [ProductController::class, 'index'])->name('productos.index');

Route::get('/comercializacion', function() {
    return view('comercializacion', ['title' => 'Punto y Barra | Comercialización']);
});

Route::get('terminos', function(){
    return view('terminos', ['title' => 'Punto y Barra | Terminos']);
});

//Para vista ingresar

// Solo pueden entrar los que NO están logueados (guest)
Route::get('ingreso', [UsuarioController::class, 'mostrarFormularioLogin'])->middleware('guest')->name('ingreso');
Route::post('ingreso', [UsuarioController::class, 'autenticar'])->name('ingreso');

Route::get('registro', [UsuarioController::class, 'mostrarFormularioRegistro'])->name('registro');
Route::post('registro', [UsuarioController::class, 'store']); 

Route::get('mostrarusuarios', [UsuarioController::class, 'mostrar'])->middleware(['auth', 'admin']);

//Ruta Cerrar Sesiom
Route::post('/logout', function (Request $request) {
    Auth::logout(); // 1. Cierra la sesión en el servidor

    $request->session()->invalidate(); // 2. Borra los datos de la sesión actual
    $request->session()->regenerateToken(); // 3. Refresca el token CSRF por seguridad

    return redirect('/ingresar'); // 4. Te manda de vuelta al login
})->name('logout');

Route::get('/ingresar', function() {
    return view('usuarios.ingresar', ['title' => 'Punto y Barra | Login']);
});

//Para Consultas

// La ruta que muestra el formulario (opcional si es estática)
Route::get('/consulta', function () {
    return view('consulta', ['title' => 'Punto y Barra | Consulta']);
});
// La ruta que procesa el formulario
Route::post('/consulta', [ConsultasController::class, 'store'])->name('/consulta');
Route::post('/contacto', [ConsultasController::class, 'store'])->name('consulta');

Route::resource('usuarios', UsuarioController::class);


//Para Carrito

// Rutas del carrito públicas (tanto para invitados como para registrados)
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/confirmar', [CarritoController::class, 'procesarCompra'])->name('carrito.confirmar');


Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::post('index', [CarritoController::class, 'agregar'])->name('carrito.agregar');

//Para Vista Admin
Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('admin');

Route::get('/admin/productos/create', [ProductController::class, 'create'])
    ->name('productos.create');

Route::post('/admin/productos', [ProductController::class, 'store'])
    ->name('productos.store');

Route::get('/admin/productos/{id}/edit', [ProductController::class, 'edit'])
    ->name('productos.edit');

Route::put('/admin/productos/{id}', [ProductController::class, 'update'])
    ->name('productos.update');

Route::delete('/admin/productos/{id}', [ProductController::class, 'destroy'])
    ->name('productos.destroy');

Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'adminEdit'])
->name('usuarios.editar');
Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'adminUpdate'])
->name('usuarios.update');
Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])
->name('usuarios.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/miPerfil', function () {
        return view('usuarios.miPerfil', ['title' => 'Punto y Barra | Mi Perfil']);
    })->name('miPerfil');
    
    Route::put('/perfil/cambiar-password', [UsuarioController::class, 'cambiarPassword'])
        ->name('perfil.cambiar-password');
});

Route::get('/admin/consultas/{id}', [ConsultasController::class, 'verConsulta'])
->name('consultas.ver');

Route::delete('/admin/consultas/{id}', [ConsultasController::class, 'destroy'])
->name('consultas.destroy');

//para facturas
Route::get(
    '/factura/{id}',
    [VentaController::class, 'factura']
)->name('factura.pdf');

Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'adminEdit'])
    ->name('usuarios.editar');

Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'adminUpdate'])
    ->name('usuarios.update');

Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])
    ->name('usuarios.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/miPerfil', function () {
        return view('usuarios.miPerfil', ['title' => 'Punto y Barra | Mi Perfil']);
    })->name('miPerfil');

    Route::put('/perfil/cambiar-password', [UsuarioController::class, 'cambiarPassword'])
        ->name('perfil.cambiar-password');
});



Route::get('/admin/consultas/{id}', [ConsultasController::class, 'verConsulta'])
    ->name('consultas.ver');

Route::delete('/admin/consultas/{id}', [ConsultasController::class, 'destroy'])
    ->name('consultas.destroy');

//Para ver compras del usuario
Route::get('/mis-compras', [VentaController::class, 'misCompras'])
    ->middleware('auth')
    ->name('ventas.mis-compras');
