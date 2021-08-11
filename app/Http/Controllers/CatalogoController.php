<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class CatalogoController extends Controller
{
    public function index($url){
        //Busco la categoria cuyo campo url_seo es igual al valor de $url, y obtengo el primer resultado
        $categoria = Categoria::where('url_seo',$url)->first();
        //Envio a la vista el objeto categoria
        return view('web.catalogo',compact('categoria'));
    }

    public function detalle($url){
        //Busco el producto cuyo campo url_seo es igual al valor de $url, y obtengo el primer resultado
        $producto = Producto::where('url_seo',$url)->first();
        //Envio a la vista el objeto producto
        return view('web.detalle',compact('producto'));
    }
}
