<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone'   => 'required',
            'message' => 'required|min:5',
        ]);

        // 2. Aquí podrías guardar en la DB si tuvieras un modelo Consulta:
        // Consulta::create($request->all());

        // 3. Redireccionamos con los datos para tu modal/alerta
        return back()->with([
            'success' => true,
            'nombre'  => $request->name,
            'email'   => $request->email
        ]);
    }
}
