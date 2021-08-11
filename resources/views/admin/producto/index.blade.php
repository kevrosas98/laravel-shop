@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Productos</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Productos</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end">
        </div>
        <div class="text-end">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a class="btn btn-primary" href="{{ route('producto.nuevo') }}" ><i class="fas fa-plus-square"></i> Nuevo</a>
                <a href="{{ route('producto.exportar') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar</a>
                <a href="{{ route('productoall.pdf') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Exportar</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>URL Seo</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $producto)
                <tr>
                    <td><img class="pb-3" src="{{ Storage::url($producto->imagen) }}" width="80px" /></td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->url_seo }}</td>
                    <td>S/ {{ $producto->precio }}</td>
                    <td>{{ $producto->existencias }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('producto.editar', $producto->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a> 
                            <a href="{{ route('producto.pdf', $producto->id) }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                            <a href="{{ route('producto.eliminar', $producto->id) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?')" ><i class="fas fa-trash-alt"></i></a>     
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection