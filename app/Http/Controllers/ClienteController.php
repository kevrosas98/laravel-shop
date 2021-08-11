<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Venta;

class ClienteController extends Controller
{
    public function index(){
        $cliente = auth()->user();
        $pedidos = Venta::where('cliente_id',$cliente->id)->get();
        return view('web.cliente_historial',compact('pedidos'));
    }

    public function pedido($id){
        $cliente = auth()->user();
        //Busco el pedido cuyo id es igual a $id y perteneciente al cliente.
        $pedido = Venta::where('id',$id)->where('cliente_id',$cliente->id)->first();
        return view('web.cliente_pedido',compact('pedido'));
    }

    public function perfil(){
        return view('web.cliente_perfil');
    }

    public function guardar(Request $request){
        $cliente = auth()->user();
        $cliente->nombres = $request->nombres;
        if($request->clave!='' && $request->clave==$request->reclave){
            $cliente->password = Hash::make($request->clave);
        }
        $cliente->dni = $request->dni;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        $mensaje = 'Sus datos han sido actualizados satisfactoriamente';
        $request->session()->flash('mensaje',$mensaje);
        return redirect('/cliente/perfil');
    }
}
