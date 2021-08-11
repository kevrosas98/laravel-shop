@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Nueva Categoria</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Categorias</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end mb-3">
            <a class="btn btn-secondary" href="{{ route('categoria.index') }}" >Regresar</a>
        </div>
        <form method="POST" action="{{ route('categoria.guardar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" oninput="url()" name="nombre" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">URL SEO</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="seo" name="seo" required />
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