<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        $data = User::all();
        return view('admin.user.index', compact('data'));

    }

    public function nuevo(){
        $datos = [
            'roles' => [ 
                ['id' => 'A', 'nombre' => 'Administrador'],
                ['id' => 'U', 'nombre' => 'Usuario']
            ]
        ];
        return view('admin.user.nuevo', $datos);
    }

    public function guardar(Request $request){
        $usuario = new User;
        $usuario->role = $request->tperfil;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make('123456');
    
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    public function detalle($id){
        $datos = [
            'usuario' => User::find($id),
            'roles' => [ 
                ['id' => 'A', 'nombre' => 'Administrador'],
                ['id' => 'U', 'nombre' => 'Usuario']
            ]
        ];
        
        return view('admin.user.editar', $datos);
    }

    public function actualizar(Request $request){
        $usuario = User::find($request->id);
        $usuario->role = $request->tperfil;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    public function eliminar($id){
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuario.index');
   }

    public function reset($id){
        $usuario = User::find($id);
        $usuario->password = Hash::make('123');
        $usuario->save();
        return redirect()->route('usuario.index');
    }   

    public function perfilIndex($id){
        $datos = [
            'usuario' => User::find($id),
        ];
        
        return view('admin.perfil.index', $datos);
    }   

    public function perfilUpdate(Request $request){
        $usuario = User::find($request->id);
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        if($request->pass!=''){
            $usuario->password = Hash::make($request->pass);
        }
        $usuario->save();
        return redirect()->route('perfil.index', $request->id);
    }
}
