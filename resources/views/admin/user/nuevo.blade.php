@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Nuevo Usuario</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('usuario.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end mb-3">
            <a class="btn btn-secondary" href="{{ route('usuario.index') }}" >Regresar</a>
        </div>
        <form method="POST" action="{{ route('usuario.guardar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="tperfil" class="col-sm-2 col-form-label">Tipo Perfil</label>
                <div class="col-sm-10">
                    <select class="form-control" id="tperfil" name="tperfil" required>
                        <option value="">Seleccione una opción</option>
                        @foreach($roles as $key => $rol)
                        <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" required />
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection