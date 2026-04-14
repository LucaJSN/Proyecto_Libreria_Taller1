<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use Illuminate\Http\Request;

Route::get('/', function () {
    echo view('navbar', ['title'=> 'Libreria | Inicio']);
    echo view('index');
    echo view('footer');
});
/*
Route::get('/sobre-mi', function() {
    return view('sobre_mi', ['title' => 'Libreria | Sobre Mí']);
});
*/
Route::get('/contacto', function(){
    return view('contacto', ['title' => 'Libreria | Contacto']);
});

Route::get('/quienes-somos', function() {
    echo view('navbar', ['title'=> 'Libreria | Quienes Somos']);
    echo view('quienes_somos');
});

?>