<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo view('navbar', ['title'=> 'Libreria | Inicio']);
    echo view('index');
    echo view('footer');
});
/*
Route::get('/sobre-mi', function() {
    return view('sobre_mi');
});
*/
Route::get('/contacto', function(){
    echo view('navbar', ['title'=> 'Libreria | Contacto']);
    echo view('contacto');
});

Route::get('/quienes-somos', function() {
    echo view('navbar', ['title'=> 'Libreria | Quienes Somos']);
    echo view('quienes_somos');
});

?>