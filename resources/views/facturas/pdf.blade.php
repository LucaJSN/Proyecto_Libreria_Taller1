<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Factura #{{ $venta->id }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background: #eee;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>

</head>
<body>

    <h1>Punto y Barra</h1>

    <h3>Factura N° {{ $venta->id }}</h3>

    <p>
        <strong>Fecha:</strong>
        {{ $venta->fecha_venta }}
    </p>

    <p>
        <strong>Cliente:</strong>
        {{ $venta->usuario->nombre }}
    </p>

    <table>

        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>

            @foreach($venta->detalles as $detalle)

                <tr>

                    <td>{{ $detalle->producto->nombre }}</td>

                    <td>{{ $detalle->cantidad }}</td>

                    <td>
                        ${{ number_format($detalle->precio_unitario, 2) }}
                    </td>

                    <td>
                        ${{ number_format($detalle->subtotal, 2) }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="total">
        TOTAL: ${{ number_format($venta->total, 2) }}
    </div>

</body>
</html>