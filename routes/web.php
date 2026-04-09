<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/catalogo', [ProductController::class, 'index']);

?>