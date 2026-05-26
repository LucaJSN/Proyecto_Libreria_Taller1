<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function mostrarFormularioRegistro()
    {
        return view('usuarios.registro', ['title' => 'Punto y Barra | Registro']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.registro', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:8|confirmed',
        ]);

        $usuario = Usuario::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'rol_id'=>1,
        ]);
        
        return redirect()->route('index')->with('exito', 'usuario registrado');
    }

    /**
     * Display the specified resource.
    
    *public function show(Usuario $usuario)
    *{
        
    *}
    */    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('exito', 'Usuario dado de baja');
    }
}
