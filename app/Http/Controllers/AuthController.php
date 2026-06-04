<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formularioRegistro(){
        return view('usuarios.registro');
    }

    public function formularioLogin(){
        return view('usuario.ingresar');
    }

    public function registrar(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    }
}
