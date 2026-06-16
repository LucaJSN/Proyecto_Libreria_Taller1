@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Mis Compras</h2>

    @if($ventas->isEmpty())

        <div class="alert alert-info">
            No has realizado compras todavía.
        </div>

    @else

        @foreach($ventas as $venta)

            <div class="card mb-3">

                <div class="card-header">

                    <strong>Compra #{{ $venta->id }}</strong>

                    <span class="float-end">
                        {{ $venta->fecha_venta }}
                    </span>

                </div>

                <div class="card-body">

                    <table class="table">

                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($venta->detalles as $detalle)

                                <tr>

                                    <td>
                                        {{ $detalle->producto->nombre }}
                                    </td>

                                    <td>
                                        {{ $detalle->cantidad }}
                                    </td>

                                    <td>
                                        ${{ number_format($detalle->subtotal,2) }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <h5>
                        Total:
                        ${{ number_format($venta->total,2) }}
                    </h5>
                    <a href="{{ route('factura.pdf', $venta->id) }}"
                    class="btn btn-success btn-sm">
                        Descargar Factura
                    </a>

                </div>

            </div>
        @endforeach

    @endif

</div>

@endsection