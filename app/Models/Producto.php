<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    // Esto le da permiso a Laravel para llenar estos campos automáticamente
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'id_categoria',
        'precio',
        'stock',
        'ulr_imagen',
        'activo'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
        'activo' => 'boolean'
    ];

    function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    function carritos()
    {
        return $this->hasMany(Carrito::class, 'id_producto');
    }
}
