<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Producto;
use Illuminate\Http\Request;

Route::get('/', function () {
    // Solo retornas la vista principal. 
    // El título lo pasas aquí y el Layout lo recibirá.
    return view('index', ['title' => 'Libreria | Inicio']);
});

Route::get('/sobre-mi', function() {
    return view('sobre_mi', ['title' => 'Libreria | Sobre Mí']);
});

Route::get('/contacto', function(){
    return view('contacto', ['title' => 'Libreria | Contacto']);
});

Route::get('/catalogo', function(){
    return view('catalogo');
});


//CRUD para Productos
// Ruta para ver el formulario
Route::get('/productos/crear', function () {
    return view('productos.crear');
})->name('productos.crear');

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

?>