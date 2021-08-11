<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;

class RegistroController extends Controller
{
    public function index(){
        return view('web.registro');
    }

    public function nuevo(Request $request){
        $mensaje = "El usuario ya existe!";
        $email = trim($request->email);
        $existe = Cliente::where('email',$email)->first();
        if(!$existe){ // Si no encuentra un usuario con el email
            $cliente = new Cliente;
            $cliente->nombres = trim($request->nombres);
            $cliente->email = $email;
            $cliente->password = Hash::make($request->clave);
            $cliente->dni = '';
            $cliente->telefono = '';
            $cliente->direccion = '';
            $cliente->save();
            $mensaje = 'Usuario creado satisfactoriamente';
        }
        $request->session()->flash('mensaje',$mensaje);
        return  redirect('/registro');
    }

    public function login(Request $request){
        $email = trim($request->email);
        $clave = $request->clave;
        if(Auth::attempt(['email'=>$email,'password'=>$clave,'estado'=>'A'])){
            // 1. Valido si existe carrito en sesion, de lo contrario devuelv un arreglo vacío
            $carrito = session('carrito',[]);
            // 2. Si la cantidad de elementos es mayor a cero, redirecciona a pagar, de lo contrario al historial
            $ruta = count($carrito) ? '/pago' : '/cliente/historial';
            return redirect($ruta);
        }else{
            $request->session()->flash('mensaje','Usuario y contraseña inválidos');
            return  redirect('/registro');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
