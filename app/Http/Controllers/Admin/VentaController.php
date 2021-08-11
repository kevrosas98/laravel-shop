<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VentasExport;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Venta;
use Maatwebsite\Excel\Facades\Excel;


class VentaController extends Controller
{
    public function index(){
        $data = Venta::all();
        return view('admin.venta.index', compact('data'));
    }

    public function detalle($id)
    {
        $data = Venta::find($id);
        return view('admin.venta.detalle', compact('data'));
    }

    public function entregado($id)
    {
        $venta = Venta::find($id);
        $venta->estado = 'E';
        $venta->save();
        return redirect()->route('venta.index');
    }

    public function pagado($id)
    {
        $venta = Venta::find($id);
        $venta->pago = '1';
        $venta->save();
        return redirect()->route('venta.index');
    }

    public function exportar(){
        return Excel::download(new VentasExport, 'ventas.xlsx');
    }
}
