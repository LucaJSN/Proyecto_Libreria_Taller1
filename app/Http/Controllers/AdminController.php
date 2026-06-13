<?php

namespace App\Http\Controllers; 


use Illuminate\Http\Request;
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
            'masVendidos'
        ));
    }
}
