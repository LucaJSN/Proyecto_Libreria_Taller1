<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;



class ProductController extends Controller
{
    public function index(Request $request){
        $busqueda = $request->input('buscar');

        $productos = Producto::query()
        ->when($busqueda, function($query, $busqueda){
            $query->where('nombre', 'like', '%' . $busqueda . '%');

        })
        ->paginate(3)->withQueryString(); //Paginación de 3 productos por página, con preservación de la query string para mantener la búsqueda al cambiar de página

        return view('catalogo',[
            'productos'=>$productos,
            'busqueda' =>$busqueda,
            'title' => 'Punto y Barra | Catalogo'
        ]);
    }


    //para exportar productos a vistaAdmin
    public function AdminIndex()
    {
        return view('admin.dashboard', [
            'productos' => Producto::all()
        ]);
    }

    public function store(Request $request)
    {
    $datos = $request->only([
    'nombre',
    'descripcion',
    'precio',
    'stock',
    'activo',
    'id_categoria'
    ]);

    if ($request->hasFile('imagen')) {

        $file = $request->file('imagen');

        $nombreImagen = time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('img/productos'),
            $nombreImagen
        );

        $datos['url_imagen'] = 'img/productos/'.$nombreImagen;
    }

    Producto::create($datos);

    return redirect()->route('admin.dashboard');
    }


    public function create()
    {
        $categorias = Categoria::all();

        return view('admin.productos.create', compact('categorias'));
    }

    public function edit(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        return view('admin.editarProductos', compact('producto'));
    }

    public function update(Request $request)
{
    $id = $request->id;
    $producto = Producto::findOrFail($id);
    
    // Validar datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);
    
    // Actualizar campos manualmente
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->descripcion = $request->descripcion;
    
    // Manejar nueva imagen si se subió
    if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $nombreImagen = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('img/productos'), $nombreImagen);
        
        // Eliminar imagen anterior si existe
        if ($producto->url_imagen && file_exists(public_path($producto->url_imagen))) {
            unlink(public_path($producto->url_imagen));
        }
        
        $producto->url_imagen = 'img/productos/'.$nombreImagen;
    }
    
    $producto->save();
    
    return redirect()->route('productos.index')
        ->with('exito', 'Producto actualizado correctamente');
}
    
    public function destroy(Request $request)
    {
        $producto = Producto::findOrFail($request->id);

        $producto->delete();

        return redirect()->route('admin.dashboard');
    }
}
