<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formularioRegistro(){
        return view('registro');
    }

    public function formularioLogin(){
        return view('ingresar');
    }
}
