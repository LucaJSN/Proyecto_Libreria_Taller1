<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index(){
        return view('catalogo', ['productos'=>$this->getProductos()]);
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
