<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function muestraUsuarios(){
        $users = \App\Models\User::all(); // Trae todos los usuarios
        return view('admin.users', compact('users'));
    }
}
