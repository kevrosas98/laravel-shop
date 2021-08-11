<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Producto;
use App\Models\Categoria;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;
use PDF;


class ProductoController extends Controller
{
    public function index(){
        $data = Producto::all();
        return view('admin.producto.index', compact('data'));
    }

    public function nuevo(){
        $categorias = Categoria::all();
        return view('admin.producto.nuevo', compact('categorias'));
    }

    public function guardar(Request $request){
        $producto = new Producto;
        $producto->categoria_id = $request->categoria;
        $producto->nombre = $request->nombre;
        $producto->url_seo = $request->seo;
        $producto->descripcion = $request->resumen;
        $producto->precio = $request->precio;
        $producto->portada = $request->portada;
        $producto->existencias = $request->stock;
        $producto->estado = $request->estado;

        //Se guarda el archivo en el campo "imagen" en la carpeta storage/public/img con un nombre aletatorio
        $producto->imagen = $request->file('imagen')->store('public/img');

        $producto->save();
        return redirect()->route('producto.index');
    }

    public function detalle($id)
    {
        $datos = [
            'categorias' => Categoria::all(),
            'productos' =>  Producto::find($id)
        ];
        return view('admin.producto.editar', $datos);
    }

    
    public function actualizar(Request $request){
        $producto = Producto::find($request->id);
        $producto->categoria_id = $request->categoria;
        $producto->nombre = $request->nombre;
        $producto->url_seo = $request->seo;
        $producto->descripcion = $request->resumen;
        $producto->precio = $request->precio;
        $producto->portada = $request->portada;
        $producto->existencias = $request->stock;
        $producto->estado = $request->estado;

        //Validamos si se ha enviado una nueva imagen
        if($request->file('imagen')){
            //Eliminanos la imagen anterior
            Storage::delete($producto->imagen);
            //Almacenamos la nueva imagen
            $producto->imagen = $request->file('imagen')->store('public/img');
        }

        $producto->save();
        return redirect()->route('producto.index');
    }

    public function eliminar($id)
    {
        $eliminar   = Producto::find($id);
        $imagen     = $eliminar->imagen;

        if (Storage::exists($imagen)) {
            Storage::delete($imagen);
        }

        $eliminar->delete();
        return redirect()->route('producto.index');
    }

    public function exportar(){
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }

    public function pdfAll()
    {
        $producto  = Producto::all();
        $datos = [
            'productos' =>  $producto
        ];

        //Caargar en la vista
        $pdf    = PDF::loadView('admin.producto.pdfall', $datos);

        //Retorname y descargame con el nombre
        return $pdf->download('producto.pdf');
    }

    public function pdf($id)
    {
        $producto  = Producto::find($id);

        $eimg = explode("/", $producto->imagen);
        
        $datos = [
            'producto' =>  $producto,
            'imagen' => $eimg 
        ];

        $pdf    = PDF::loadView('admin.producto.pdf', $datos);

        return $pdf->download('producto.pdf');
    }
}
