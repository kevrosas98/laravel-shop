@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Detalle de la Venta ({{ count($data->venta_productos) }} items)</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('venta.index') }}">Ventas</a></li>
    <li class="breadcrumb-item active">Detalle Venta</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end mb-3">
            <a class="btn btn-secondary" href="{{ route('venta.index') }}" >Regresar</a>
        </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->venta_productos as $detalle)
                        <tr>
                            <th scope="row">{{ $detalle->producto->nombre }}</th>
                            <td>S/ {{ number_format($detalle->precio,2) }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>S/ {{ number_format($detalle->precio *  $detalle->cantidad, 2)}}</td>
                        </tr>
                    }
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection