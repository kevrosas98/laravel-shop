@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Categorias</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Categorias</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end">
            <a class="btn btn-primary" href="{{ route('categoria.nuevo') }}" >Nueva Categoria</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>URL Seo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->url_seo }}</td>
                    <td>
                        <a href="{{ route('categoria.editar', $categoria->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a> 
                        <a href="{{ route('categoria.eliminar', $categoria->id) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?')" ><i class="fas fa-trash-alt"></i></a>     
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection