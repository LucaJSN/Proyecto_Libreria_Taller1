<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultas;

class ConsultasController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'nombres'    => 'required|string|max:100',
            'mail'   => 'required|email',
            'telefono'   => 'required',
            'mensaje' => 'required|min:20',
        ]);

        // 2. Aquí podrías guardar en la DB si tuvieras un modelo Consulta:
        Consultas::create($request->all());

        // 3. Redireccionamos con los datos para tu modal/alerta
        return back()->with([
            'success' => true,
            'nombres'  => $request->name,
            'mail'   => $request->email
        ]);
    }

    public function getConsultas()
    {
        return view('admin.dashboard', [
            'consultas' => Consultas::all()
        ]);
    }

    public function verConsulta(Request $request){
        $consulta = $request->id;
        return view('admin.consultas.ver', compact($consulta));
    }

    public function destroy(Request $request)
    {
        $consulta = Consultas::findOrFail($request->id);

        $consulta->delete();

        return redirect()->route('admin.dashboard');
    }
}
