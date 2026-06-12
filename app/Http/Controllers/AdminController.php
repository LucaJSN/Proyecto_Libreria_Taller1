<?php

namespace App\Http\Controllers; 


use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;

class AdminController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        $ventas = Venta::with([
            'usuario',
            'detalles.producto'
        ])->get();

        return view('admin.dashboard', compact(
            'productos',
            'ventas'
        ));
    }
}
