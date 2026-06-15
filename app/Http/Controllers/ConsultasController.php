<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultas;

class ConsultasController extends Controller
{
    /**
     * Guardar una nueva consulta (desde el formulario público)
     */
    public function store(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'nombres'    => 'required|string|max:100',
            'mail'       => 'required|email',
            'telefono'   => 'required|string',
            'mensaje'    => 'required|min:20',
        ]);

        // 2. Guardamos en la base de datos
        Consultas::create([
            'nombres'  => $request->nombres,
            'mail'     => $request->mail,
            'telefono' => $request->telefono,
            'mensaje'  => $request->mensaje,
            // 'leida' ya tiene valor por defecto = false
        ]);

        // 3. Redireccionamos con mensaje de éxito
        return back()->with([
            'success' => true,
            'mensaje' => 'Mensaje enviado correctamente. Te contactaremos pronto.',
            'nombre'  => $request->nombres,
            'email'   => $request->mail
        ]);
    }

    /**
     * Mostrar lista de consultas (para el admin)
     */
    public function index()
    {
        $consultas = Consultas::orderBy('created_at', 'desc')->paginate(10);
        $pendientes = Consultas::where('leida', false)->count();
        $respondidas = Consultas::where('leida', true)->count();
        
        return view('admin.consultas.index', compact('consultas', 'pendientes', 'respondidas'));
    }

    /**
     * Ver detalle de una consulta específica
     */
    public function verConsulta(Request $request)
    {
        $consulta = Consultas::findOrFail($request->id);
        
        $consulta->save();
        
        return view('admin.consultas.verDetalle', compact('consulta'));
    }

    /**
     * Alternar estado leída/no leída
     */
    public function toggle(Request $request)
    {
        $consulta = Consultas::findOrFail($request->id);
        $consulta->save();
        
        
        return back()->with('success', "Consulta leida correctamente");
    }

    /**
     * Eliminar una consulta
     */
    public function destroy(Request $request)
    {
        $consulta = Consultas::findOrFail($request->id);
        $nombre = $consulta->nombres;
        $consulta->delete();
        
        return redirect()->route('admin.consultas.index')
            ->with('success', "Consulta de {$nombre} eliminada correctamente");
    }

}