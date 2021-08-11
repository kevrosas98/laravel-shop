<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function ingresar(Request $request){
        $usuario = $request->usuario;
        $clave = $request->clave;
        if(Auth::guard('admin')->attempt(['email'=>$usuario,'password'=>$clave])){
            return redirect('/admin/dash');
        }else{
            $request->session()->flash('mensaje','Usuario y contraseña inválidos');
            return  redirect('/admin/login');
        }
    }

    public function salir(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
