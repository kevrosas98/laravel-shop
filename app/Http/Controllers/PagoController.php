<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\VentaProducto;
use App\Mail\ConfirmacionCompra;

class PagoController extends Controller
{
    public function index(){
        if(\Auth::check()){
            return view('web.pago');
        }else{
            return redirect('registro');
        }        
    }

    public function procesar(Request $request){
        $carrito = session('carrito');
        // Cabecera de la venta
        $venta = new Venta;
        $venta->cliente_id = \Auth::user()->id;
        $venta->forma_envio = $request->envio;
        $venta->forma_pago = $request->pago;
        $venta->direccion = $request->envio=='D' ? $request->direccion : 'Tienda';
        $venta->total = 0;
        foreach($carrito as $producto){
            $venta->total+= $producto['cantidad']*$producto['precio'];
        }
        // El unico caso que la venta es pagada, es con el pago en Línea
        $venta->pago = $request->pago=='L' ? '1' : '0';
        if($request->pago=='L'){
            $venta->fecha_pago =  date('Y-m-d H:i:s');
        }
        $venta->estado = "P";
        if($venta->save()){
            $request->session()->forget('carrito');
            $idventa = $venta->id;
            // Detalle de la venta
            foreach($carrito as $id => $producto){
                $detalle = new VentaProducto;
                $detalle->venta_id = $idventa;
                $detalle->producto_id = $id;
                $detalle->precio = $producto['precio'];
                $detalle->cantidad = $producto['cantidad'];
                $detalle->total = $producto['total'];
                $detalle->save();
            }
            // Asignamos los datos a la vista del email
            $mailable = new ConfirmacionCompra($venta);
            //Enviamos el email al cliente
            $para = \Auth::user()->email;
            \Mail::to($para)->send($mailable);
            return redirect('/completado');
        }
    }

    public function completado(){
        return view('web.completado');
    }
}
