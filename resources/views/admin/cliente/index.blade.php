@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Clientes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Clientes</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{ route('clienteadm.nuevo') }}" class="btn btn-primary" >Nuevo</a>
                <a href="{{ route('clienteadm.exportar') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Nro. Compras</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $cliente)
                <tr>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>
                    @php
                    $count=0;
                    foreach($venta as $ventas){
                        if($ventas->cliente_id == $cliente->id){
                            $count = $count + 1;
                        }
                    }
                    @endphp

                    {{ $count }}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('clienteadm.editar', $cliente->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a> 
                            <a href="{{ route('clienteadm.reset', $cliente->id) }}" class="btn btn-success" onclick="return confirm('¿Está seguro de resetear la contraseña de este usuario')" ><i class="fas fa-key"></i></a> 
                            @if($count == 0)
                            <a href="{{ route('clienteadm.eliminar', $cliente->id) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?')" ><i class="fas fa-trash-alt"></i></a>   
                            @endif
                        </div>     
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection