<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;


class InicioController extends Controller
{
    public function index(){
        // Selecciona todos los productos donde la portada es igual a 1
        $lista = Producto::where('portada',1)->get();
        $datos = [
            'productos' => $lista,
        ];
        //Envio la lista de productos a la vista
        return view('web.inicio',$datos);
    }
    
}
