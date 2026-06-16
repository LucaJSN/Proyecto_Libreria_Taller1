<?php

namespace App\Http\Controllers; 


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Consultas;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();

        $ventas = Venta::with([
            'usuario',
            'detalles.producto'
        ])->get();

        $usuarios = Usuario::latest()->paginate(10);
        
        // Para el modal: todos (o podrías paginarlos también)
        $todosUsuarios = Usuario::all();

        $consultas = Consultas::all();

        $masVendidos = DetalleVenta::select(
            'id_producto',
            DB::raw('SUM(cantidad) as total_vendido')
        )
        ->with('producto')
        ->groupBy('id_producto')
        ->orderByDesc('total_vendido')
        ->take(5)
        ->get();

        return view('admin.dashboard', compact(
            'productos',
            'ventas',
            'masVendidos',
            'usuarios',
            'todosUsuarios',
            'consultas'
        ));
    }
}
