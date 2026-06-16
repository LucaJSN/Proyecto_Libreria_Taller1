<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function factura($id)
    {
        $venta = Venta::with([
            'usuario',
            'detalles.producto'
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'facturas.pdf',
            compact('venta')
        );

        return $pdf->download(
            'factura_'.$venta->id.'.pdf'
        );
    }

    public function misCompras()
    {
        $ventas = Venta::with([
            'detalles.producto'
        ])
        ->where('id_usuario', Auth::id())
        ->orderByDesc('fecha_venta')
        ->get();

        return view('ventas.mis-compras', compact('ventas'));
    }
}