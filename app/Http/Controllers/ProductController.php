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

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if($producto->url_imagen && file_exists(public_path($producto->url_imagen))){
            unlink(public_path($producto->url_imagen));
        }
        $producto->delete();

        return redirect()->route('admin.dashboard')->   with('exito', 'Producto eliminado exitosamente');
    }
}
