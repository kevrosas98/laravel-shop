@extends('layouts.admin')

@section('contenido')
<h1 class="mt-4">Detalle del Producto</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="{{ route('inicio.admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('producto.index') }}">Productos</a></li>
    <li class="breadcrumb-item active">Editar</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="text-end mb-3">
            <a class="btn btn-secondary" href="{{ route('producto.index') }}" >Regresar</a>
        </div>
        <form method="POST" action="{{ route('producto.actualizar') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $productos->id }}" />
            <div class="mb-3 row">
                <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <select class="form-control" id="categoria" name="categoria" required>
                        <option value="">Seleccione una opción</option>

                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" 
                        {{ $categoria->id == $productos->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}
                        </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" oninput="url()" value="{{ $productos->nombre }}" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="seo" class="col-sm-2 col-form-label">URL SEO</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="seo" name="seo" value="{{ $productos->url_seo }}" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $productos->precio }}" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $productos->existencias }}" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="resumen" class="col-sm-2 col-form-label">Resumen</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="resumen" name="resumen" rows="3">{{ $productos->descripcion }}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Portada</label>
                <div class="col-sm-10">
                    <select class="form-control" id="portada" name="portada" required>
                        <option value="">Seleccione una opción</option>
                        @if($productos->portada == '1')
                        <option value="1" selected>Si</option>
                        <option value="0">No</option>
                        @else
                        <option value="1">Si</option>
                        <option value="0" selected>No</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="">Seleccione una opción</option>
                        @if($productos->estado == 'A')
                            <option value="A" selected >Activo</option>
                            <option value="I">Inactivo</option>
                        @else
                            <option value="A">Activo</option>
                            <option value="I" selected>Inactivo</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-10">
                    <img class="pb-3" src="{{ Storage::url($productos->imagen) }}" />
                    <input type="file" class="form-control" id="imagen" name="imagen" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="imagen" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection