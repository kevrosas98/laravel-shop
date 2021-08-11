@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Ventas</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Ventas</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{ route('venta.exportar') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nro Venta</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Forma Envio</th>
                    <th>Forma Pago</th>
                    <th>Pagado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $venta)
                <tr>
                    <td>{{ sprintf('%08d', $venta->id) }}</td>
                    <td><span class="badge bg-warning text-dark">{{ Util::formatoEstado($venta->estado) }}</span></td>
                    <td>{{ Util::formatoFecha($venta->fecha_registro) }}</td>
                    <td>{{ $venta->cliente->dni }} - {{ $venta->cliente->nombres }}</td>
                    <td>S/ {{ number_format($venta->total,2) }}</td>
                    <td>{{ Util::formaEnvio($venta->forma_envio) }}</td>
                    <td>{{ Util::formaPago($venta->forma_pago) }}</td>
                    <td>{{ Util::pagado($venta->pago) }}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="{{ route('venta.detalle', $venta->id) }}" class="btn btn-success" ><i class="fas fa-eye"></i></a>     

                        @if($venta->pago == '0')
                        <a href="{{ route('venta.pago', $venta->id) }}" class="btn btn-dark" onclick="return confirm('¿Está seguro que la venta ha sido pagada?')"><i class="fas fa-dollar-sign"></i></a>
                        @endif

                        @if($venta->estado == 'P' && $venta->pago == '1')
                        <a href="{{ route('venta.entregado', $venta->id) }}" class="btn btn-info text-light" onclick="return confirm('¿Está seguro que la venta ha sido entregada?')"><i class="fas fa-truck-loading"></i></a>
                        @endif

                        <a href="{{ route('venta.anulado', $venta->id) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de anular la venta?')" ><i class="fas fa-trash-alt"></i></a>      
                    </div>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection