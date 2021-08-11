@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Mi Perfil</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Mi Perfil</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('perfil.actualizar') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $usuario->id }}" />
            <div class="mb-3 row">
                <label for="tperfil" class="col-sm-2 col-form-label">Tipo Perfil</label>
                <div class="col-sm-10">
                    <label>{{ $usuario->role == 'A' ? 'Administrador' : 'Usuario' }}</label>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->name }}" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Actualizar Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass" />
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