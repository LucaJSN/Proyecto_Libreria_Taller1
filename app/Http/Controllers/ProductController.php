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
        ->paginate(3)->withQueryString(); //Paginación de 3 productos por página, con preservación de la query string para mantener la búsqueda al cambiar de página

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
