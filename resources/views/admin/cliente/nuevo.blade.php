@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Nuevo Cliente</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('clienteadm.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active">Nuevo Cliente</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end mb-3">
            <a class="btn btn-secondary" href="{{ route('clienteadm.index') }}" >Regresar</a>
        </div>
        <form method="POST" action="{{ route('clienteadm.guardar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dni" class="col-sm-2 col-form-label">DNI</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="dni" name="dni" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="telefono" name="telefono" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="direccion" name="direccion" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="">Seleccione una opción</option>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select>
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