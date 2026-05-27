<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

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

        return view('carrito', compact('itemsCarrito', 'total'));
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
}