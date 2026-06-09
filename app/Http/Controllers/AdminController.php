<?php

namespace App\Http\Controllers; 


use Illuminate\Http\Request;
use App\Models\Producto;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productos = Producto::all();

        return view('admin.dashboard', compact('productos'));
    }
}
