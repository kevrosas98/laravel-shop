@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Usuarios</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end">
            <a class="btn btn-primary" href="{{ route('usuario.nuevo') }}" >Nuevo</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $usuario)
                @if( Auth::guard('admin')->user()->name != $usuario->name )
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{ route('usuario.editar', $usuario->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a> 
                        <a href="{{ route('usuario.reset', $usuario->id) }}" class="btn btn-success" onclick="return confirm('¿Está seguro de resetear la contraseña de este usuario')" ><i class="fas fa-key"></i></a> 
                        <a href="{{ route('usuario.eliminar', $usuario->id) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?')" ><i class="fas fa-trash-alt"></i></a>     
                    </td>
                @endif                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection