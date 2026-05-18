<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index(Request $request){
        $busqueda = $request->input('buscar');

        $productos = Producto::query()
        ->when($busqueda, function($query, $busqueda){
            $query->where('nombre', 'like', '%' . $busqueda . '%');

        })
        ->get();

        return view('catalogo',[
            'productos'=>$productos,
            'busqueda' =>$busqueda,
            'title' => 'Punto y Barra | Catalogo'
        ]);
    }


    //para exportar productos a vistaAdmin
    public function AdminIndex(){
        return view('vistaAdmin', ['productos'=>$this->getProductos()]);
    }

    private function getProductos()
    {
        return Producto::all(); 
    }
}
