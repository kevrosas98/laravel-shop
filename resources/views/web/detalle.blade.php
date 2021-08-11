@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item">
            <a href="/catalogo/{{$producto->categoria->url_seo}}">{{$producto->categoria->nombre}}</a>
            </li>
          <li class="breadcrumb-item active" aria-current="page">{{$producto->nombre}}</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<!-- Inicio Contenido -->
<section class="my-5">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <img src="{{ Storage::url($producto->imagen) }}" class="card-img-top" alt="producto">
            </div>
          </div>
          <!-- Item info-->
          <div class="col-lg-6">
            <div class="badge bg-info small rounded-0 mb-2">{{$producto->categoria->nombre}}</div>
            <h1>{{$producto->nombre}}</h1>
            <div class="d-flex align-items-center">
              <ul class="list-inline mb-2 me-3 small">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-muted"></i></li>
              </ul>
              <p class="small text-muted mb-2">12 Opiniones de los usuarios</p>
            </div>
            <p class="h4">S/ {{$producto->precio}}</p>
            <p class="text-small mb-4">{{$producto->descripción}}</p>
            <form method="post" action="/carrito">
              @csrf
              <input type="hidden" name="id" value="{{$producto->id}}" />
              <div class="d-flex align-items-center mb-4">
                <div class="border d-flex align-items-center justify-content-between p-1 me-2">
                  <div class="quantity py-0">
                    <button type="button" class="dec-btn p-0" onclick="decrease(this)"><i class="fas fa-caret-left"></i></button>
                    <input class="form-control border-0 shadow-0 p-0 quantity-result" name="cantidad" type="text" value="1">
                    <button type="button" class="inc-btn p-0" onclick="increase(this)"><i class="fas fa-caret-right"></i></button>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm py-2 border-bottom-0 px-5 me-3"> <i class="fas fa-shopping-bag py-1 me-2"></i>Añadir al carrito</button>
                <a class="p-0 reset-anchor d-inline-block mx-2" href="#"><i class="fas fa-share-alt"></i></a>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
<!-- Fin Contenido -->
@endsection