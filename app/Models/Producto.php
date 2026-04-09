<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    // Esto le da permiso a Laravel para llenar estos campos automáticamente
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'imagen'
    ];
}
