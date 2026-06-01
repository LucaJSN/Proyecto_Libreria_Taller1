<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */ 
    /*
    public function handle(Request $request, Closure $next)
    {
        // Verificar si está autenticado
        if (!Auth::check()) {
            return redirect()->route('ingreso')->with('error', 'Debes iniciar sesión');
        }
        
        // Verificar si es admin (asumiendo rol_id = 1 es admin)
        if (Auth::user()->rol_id != 1) {
            return redirect()->route('index')->with('error', 'No tienes permisos de administrador');
        }
        
        return $next($request);
    } */
}
