<?php

namespace App\Http\Controllers;

use App\Models\User; // 1. IMPORTANTE: Sin esto, Laravel no encuentra la tabla
use Illuminate\Support\Facades\Hash; // 2. IMPORTANTE: Para encriptar la clave
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index() {
        // Aquí es donde le dices: "Cuando alguien entre a /ingresar, dale la vista"
        return view('ingresar'); 
    }

    public function store(Request $request)
    {
        // Recibimos lo que el usuario escribió en el formulario de login (en ingresar)
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciales)) {
        // Esta línea es MUY IMPORTANTE: regenera la sesión por seguridad
        $request->session()->regenerate();

        // Si es Admin, podrías mandarlo a un lugar especial (opcional)
        if (Auth::user()->role === 'admin') {
            return redirect('/vistaAdmin'); 
        }

        // Si es un usuario común, al catálogo
        return redirect('/catalogo');
        }
    
    return back()->withErrors(['email' => 'Correo o clave incorrectos']);
    }
}
