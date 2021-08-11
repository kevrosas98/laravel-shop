<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    function index(Request $request){
        //carrito[idproducto] = [nombre,imagen,precio,cantidad,total]
        //carrito[23] = [chocosoda,chocosoda.jpg,1.2,2,2.40]
        //carrito[17] = [Papa Lays 40gr,papalays.jpg,1.2,3,3.60]
        // ...

        //Verificamos si nos estan enviando la variable id por el método POST
        if($request->has('id')){
            // $carrito es una variable local
            // Verifico si hay en sesion $carrito,
            // si hay, me devuelve todo el contenido del carrito
            // de lo contrario, me devuelve un arreglo vacío
            $carrito = session('carrito',[]);
            $id = $request->id;
            $cant = $request->cantidad;
            //Busco el producto por su id
            $producto = Producto::find($id);
            $contenido = [
                'nombre' => $producto->nombre,
                'imagen' => $producto->imagen,
                'url_seo' => $producto->url_seo,
                'precio' => $producto->precio,
                'cantidad' => $request->cantidad,
                'total' => ($producto->precio*$request->cantidad)
            ];
            $carrito[$id] = $contenido;
            //coloco en sesión el nuevo contenido del carrito
            $request->session()->put('carrito',$carrito);
        }
        return view('web.carrito');
    }

    function eliminar(Request $request, $idprod){
        //carrito[idproducto] = [nombre,imagen,precio,cantidad,total]
        //carrito[23] = [chocosoda,chocosoda.jpg,1.2,2,2.40] <= Este vamos a eliminar
        //carrito[17] = [Papa Lays 40gr,papalays.jpg,1.2,3,3.60]
        $carrito = session('carrito');
        $nCarrito = []; // Nuevo carrito
        //$key es igual al id del producto guardado como indice
        foreach($carrito as $key => $producto){
            if($key!=$idprod){ //Verifico que el indice sea distinto al id del producto que queremos elimnar
                //La idea es pasar los productos del carrito a otro pero dejando el producto que quereemos eliminar
                $nCarrito[$key] = $producto;
            }
        }
        $request->session()->put('carrito',$nCarrito);
        return redirect('/carrito');
    }
}
