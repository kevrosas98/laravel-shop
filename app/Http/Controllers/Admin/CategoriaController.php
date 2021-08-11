<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $data = Categoria::all();
        return view('admin.categoria.index', compact('data'));
    }

    public function nuevo(){
        return view('admin.categoria.nuevo');
    }

    public function guardar(Request $request){
        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->url_seo = $request->seo;
        $categoria->save();
        return redirect()->route('categoria.index');
    }

    public function detalle($id){
        $categoria = Categoria::find($id);
        return view('admin.categoria.editar', compact('categoria'));
    }

    public function actualizar(Request $request){
        $categoria = Categoria::find($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->url_seo = $request->seo;
        $categoria->save();
        return redirect()->route('categoria.index');
    }

    public function eliminar($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.index');
   }
}
