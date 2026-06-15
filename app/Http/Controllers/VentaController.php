<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;

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
}