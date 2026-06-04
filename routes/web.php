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

Route::get('/', function () {
    return view('index', ['title' => 'Punto y Barra | Inicio']);
})->name('index');
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

Route::get('/vistaAdmin', [ProductController::class, 'AdminIndex']);

Route::get('/comercializacion', function() {
    return view('comercializacion', ['title' => 'Libreria | Comercialización']);
});

//CRUD para Productos
// Ruta para ver el formulario
Route::get('/productos/crear', function () {
    return view('productos.crear', ['title' => 'PyB | Crear Proudcto']);
})->name('productos.crear');

Route::get('/terminos', function(){
    return view('terminos', ['title' =>  'Punto y Barra | Terminos']);
});

// Ruta para guardar
Route::post('/catalogo', function (Request $request) {
    $datos = $request->only(['nombre', 'descripcion', 'precio', 'imagen']);
    //Necesario para guardar imagenes
    if ($request->hasFile('imagen')) {
        // 1. Tomamos el archivo
        $file = $request->file('imagen');
        // 2. Le ponemos un nombre único
        $nombreImagen = time() . '_' . $file->getClientOriginalName();
        // 3. Lo movemos a public/img/productos
        $file->move(public_path('img/productos'), $nombreImagen);
        // 4. Guardamos la ruta en el array de datos
        $datos['imagen'] = 'img/productos/' . $nombreImagen;
    }

    // Aquí guardas en la base de datos
    // Producto::create($request->all());
    App\Models\Producto::create($datos);
    return redirect('/productos/crear');
})->name('productos.store');

//Modificación para agregar busqueda de productos
Route::get('/catalogo', [ProductController::class, 'index']) ->name('productos.index');

Route::get('/comercializacion', function() {
    return view('comercializacion', ['title' => 'Libreria | Comercialización']);
});

//Rutas para vista Admin

// Ruta accesible para cualquier usuario logueado
Route::get('/admin', function () {
    // 1. Verificamos si el usuario está logueado
    if (!Auth::check()) {
        return redirect('/ingresar');
    }

    // 2. Verificamos si el rol es 'admin'
    if (Auth::user()->role !== 'admin') {
        // Si no es admin, lo mandamos a la página principal con un error
        return redirect('/')->with('error', 'No tienes permisos de administrador.');
    }

    // 3. Si todo está bien, mostramos la vista que creaste
    return view('vistaAdmin'); 
})->name('admin.index');


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
Route::post('/consulta', [ConsultasController::class, 'store']);

Route::resource('usuarios', UsuarioController::class);

// Esta ruta estaba de sobra
// Route::get('/catalogo', function(){
//     return view('catalogo', ['title' => 'Punto y Barra | Catalogo']);
// });


//Para Carrito
Route::get('/carrito', function () {
    return view('carrito');
});

// Rutas del carrito públicas (tanto para invitados como para registrados)
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
?>