<?php

namespace App\Helpers;
use App\Models\Categoria;

class Util {

    public static function menuSuperior(){
        return Categoria::all();
    }

    public static function carrito(){
        return count(session('carrito',[]));
    }

    public static function formatoFecha($fecha){
        $tiempo = strtotime($fecha);
        $meses = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        $dia = date('d',$tiempo);
        $mes = date('m',$tiempo);
        $m = $meses[$mes-1];
        $anio = date('Y',$tiempo);
        return "$dia $m, $anio";
    }

    public static function formatoEstado($valor){
        $estados = ['P'=>'Esperando Entrega','E'=>'Pedido Entregado','N'=>'Pedido Anulado'];
        return $estados[$valor];
    }

    public static function formaEnvio($valor){
        $envios = ['D'=>'Delivery','L'=>'Recojo en tienda'];
        return $envios[$valor];
    }

    public static function formaPago($valor){
        $pagos = ['E'=>'En efectivo','P'=>'Con POS','L'=>'En línea'];
        return $pagos[$valor];
    }

    public static function Pagado($valor){
        $pagado = ['0'=>'Falta Pagar','1'=>'Pagado'];
        return $pagado[$valor];
    }
    
}