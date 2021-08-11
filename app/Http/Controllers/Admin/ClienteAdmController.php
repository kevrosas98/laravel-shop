<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClientesExport;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Venta;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;



class ClienteAdmController extends Controller
{
    public function index(){
        $datos = [
            'data' => Cliente::all(),
            'venta' => Venta::all()
        ];
        return view('admin.cliente.index', $datos);
    }

    public function nuevo(){
        return view('admin.cliente.nuevo');
    }

    public function guardar(Request $request){
        $cliente = new Cliente;
        $cliente->nombres       = $request->nombre;
        $cliente->dni           = $request->dni;
        $cliente->telefono      = $request->telefono;
        $cliente->direccion     = $request->direccion;
        $cliente->email         = $request->email;
        $cliente->password      = Hash::make('123456');
        $cliente->estado        = $request->estado;
    
        $cliente->save();
        return redirect()->route('clienteadm.index');
    }

    public function detalle($id){
        $datos = [
            'cliente' => Cliente::find($id),
        ];
        
        return view('admin.cliente.editar', $datos);
    }

    public function actualizar(Request $request){
        $cliente = Cliente::find($request->id);

        $cliente->nombres       = $request->nombre;
        $cliente->dni           = $request->dni;
        $cliente->telefono      = $request->telefono;
        $cliente->direccion     = $request->direccion;
        $cliente->email         = $request->email;
        $cliente->estado        = $request->estado;
        $cliente->save();

        return redirect()->route('clienteadm.index');
    }

    public function eliminar($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clienteadm.index');
    }

    public function reset($id){
        $cliente = Cliente::find($id);
        $cliente->password = Hash::make('123');
        $cliente->save();
        return redirect()->route('clienteadm.index');
    }

    public function exportar(){
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }
}
