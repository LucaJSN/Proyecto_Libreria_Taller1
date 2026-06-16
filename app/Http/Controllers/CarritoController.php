<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\DetalleVenta;

class CarritoController extends Controller
{
    /**
     * Mostrar el carrito del usuario (autenticado o invitado).
     */
    public function index()
    {
        $idUsuario = Auth::id();
        $sessionId = session()->getId(); // Identificador único del invitado

        // Buscamos los ítems filtrando por usuario si está logueado, o por sesión si es invitado
        $itemsCarrito = Carrito::with('producto')
            ->where(function ($query) use ($idUsuario, $sessionId) {
                if ($idUsuario) {
                    $query->where('id_usuario', $idUsuario);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->get();

        // Calculamos el total de la compra de forma segura
        $total = $itemsCarrito->sum(function($item) {
            // Validamos que el producto exista para evitar errores si se borró de la DB
            return $item->producto ? $item->producto->precio * $item->cantidad : 0;
        });

        return view('carrito', compact('itemsCarrito', 'total'), ['title' => 'Punto y Barra | Carrito']);
    }

    /**
     * Agregar un producto al carrito (o actualizar su cantidad).
     */
    public function agregar(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $idUsuario = Auth::id();
        $sessionId = session()->getId(); // Siempre disponible para invitados
        $idProducto = $request->id_producto;
        $cantidad = $request->cantidad;

        // Buscar si ya existe este producto en el carrito de este usuario o sesión
        $existe = Carrito::where('id_producto', $idProducto)
            ->where(function ($query) use ($idUsuario, $sessionId) {
                if ($idUsuario) {
                    $query->where('id_usuario', $idUsuario);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->first();

        if ($existe) {
            // Si ya existe, sumamos la nueva cantidad
            $existe->cantidad += $cantidad;
            $existe->save();
        } else {
            // Si no existe, lo creamos guardando el session_id si es invitado
            Carrito::create([
                'id_usuario' => $idUsuario,
                'session_id' => $idUsuario ? null : $sessionId,
                'id_producto' => $idProducto,
                'cantidad' => $cantidad,
            ]);
        }

        return redirect()->route('carrito.index')->with('success', 'Producto añadido al carrito.');
    }

    /**
     * Eliminar un producto del carrito.
     */
    public function eliminar($id)
    {
        $idUsuario = Auth::id();
        $sessionId = session()->getId();

        // Nos aseguramos de que el ítem pertenezca al usuario actual o a su sesión activa
        $item = Carrito::where('id', $id)
            ->where(function ($query) use ($idUsuario, $sessionId) {
                if ($idUsuario) {
                    $query->where('id_usuario', $idUsuario);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->firstOrFail();

        $item->delete();

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }

    

    public function vaciarCarrito()
    {
        $idUsuario = Auth::id();
        $sessionId = session()->getId();

        // 1. Buscamos los productos del carrito de ESTA sesión o usuario
        $itemsCarrito = Carrito::where(function ($query) use ($idUsuario, $sessionId) {
            if ($idUsuario) {
                $query->where('id_usuario', $idUsuario);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->get();

        // 2. Validamos si está vacío para avisarle al usuario de forma amigable
        if ($itemsCarrito->isEmpty()) {
            return redirect()->back()->with('error', 'El carrito ya está vacío.');
        }

        // 3. Borramos todos los registros encontrados
        $itemsCarrito->each->delete(); 

        // 4. Redirigimos de vuelta a la vista con un mensaje de éxito
        return redirect()->route('carrito.index')->with('success', 'Se vació el carrito correctamente.');
    }

    public function procesarCompra()
    {
        $idUsuario = Auth::id();
        $sessionId = session()->getId();

        // 1. Obtener los productos que están en el carrito de este usuario/invitado
        $itemsCarrito = Carrito::with('producto')
            ->where(function ($query) use ($idUsuario, $sessionId) {
                if ($idUsuario) {
                    $query->where('id_usuario', $idUsuario);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })->get();

        if ($itemsCarrito->isEmpty()) {
            console.log("No hay stock suficiente");
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        // 2. Iniciar la transacción de la Base de Datos de forma segura
        try {
            $total = 0;

            foreach ($itemsCarrito as $item) {
                $total += $item->cantidad * $item->producto->precio;
            }

            DB::transaction(function () use ($itemsCarrito, $idUsuario, $total, &$venta) {
                $venta = Venta::create([
                    'id_usuario' => $idUsuario,
                    'fecha_venta' => now(),
                    'total' => $total,
                    'estado' => 'Pendiente'
                ]);
                foreach ($itemsCarrito as $item) {
                    $producto = $item->producto;

                    // Verificar si hay stock suficiente antes de restar
                    if (!$producto || $producto->stock < $item->cantidad) {
                        // Lanzamos una excepción para cancelar todo si un producto no tiene stock
                        throw new \Exception("Stock insuficiente para el producto: " . ($producto ? $producto->nombre : 'Desconocido'));
                    }

                    DetalleVenta::create([
                        'id_venta' => $venta->id,
                        'id_producto' => $producto->id,
                        'cantidad' => $item->cantidad,
                        'precio_unitario' => $producto->precio,
                        'subtotal' => $item->cantidad * $producto->precio
                    ]);

                    // Restar el stock del producto
                    $producto->stock -= $item->cantidad;
                    $producto->save(); // Guarda el nuevo stock en la tabla 'productos'
                }

                // 3. Una vez restado todo el stock con éxito, vaciamos el carrito
                // Borra todas las filas del carrito que acabamos de procesar
                $itemsCarrito->each->delete(); 
            });

            // Si todo sale bien, redirige al catálogo o home con éxito
            return redirect()->route('productos.index') ->with('venta_realizada', $venta->id);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    
}