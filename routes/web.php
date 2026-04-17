<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use Illuminate\Http\Request;

Route::get('/', function () {
    echo view('index');
});
/*
Route::get('/sobre-mi', function() {
    return view('sobre_mi', ['title' => 'Libreria | Sobre Mí']);
});
*/
Route::get('/contacto', function(){
    return view('contacto', ['title' => 'Libreria | Contacto']);
});


Route::get('/quienes-somos', function(){
    return view('quienes-somos');
});

Route::get('/catalogo', function(){
    return view('catalogo');
});

Route::get('/vistaAdmin', [ProductController::class, 'AdminIndex']);

//CRUD para Productos
// Ruta para ver el formulario
Route::get('/productos/crear', function () {
    return view('productos.crear');
})->name('productos.crear');

Route::get('/terminos', function(){
    return view('terminos');
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

Route::get('/catalogo', [ProductController::class, 'index']);

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

Route::get('/ingresar', function() {
    return view('ingresar');
});
// Solo pueden entrar los que NO están logueados (guest)
Route::get('/ingresar', [UserController::class, 'index'])->name('login')->middleware('guest');

Route::post('/ingresar', [UserController::class, 'store']);

//Ruta Cerrar Sesiom
Route::post('/logout', function (Request $request) {
    Auth::logout(); // 1. Cierra la sesión en el servidor

    $request->session()->invalidate(); // 2. Borra los datos de la sesión actual
    $request->session()->regenerateToken(); // 3. Refresca el token CSRF por seguridad

    return redirect('/ingresar'); // 4. Te manda de vuelta al login
})->name('logout');

?>