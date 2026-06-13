<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'id_usuario',
        'fecha_venta',
        'total',
        'estado'
    ];

    public function index()
    {
        $ventas = Venta::with([
            'usuario',
            'detalles.producto'
        ])->get();

        return view('admin.ventas', compact('ventas'));
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta');
    }
}