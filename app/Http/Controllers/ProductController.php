<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return view('catalogo', compact('productos'));
    }
}
