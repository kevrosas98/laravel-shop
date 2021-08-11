@extends('layouts.web')

@section('contenido')
<!-- Inicio Banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://i2.wp.com/www.silviagaliana.com/wp-content/uploads/2013/01/Portada-Facebook-Mario-Bros.jpg" class="d-block w-100" alt="banner">
      </div>
      <div class="carousel-item">
        <img src="https://i2.wp.com/www.silviagaliana.com/wp-content/uploads/2013/01/Portada-Facebook-Mario-Bros.jpg" class="d-block w-100" alt="banner">
      </div>
      <div class="carousel-item">
        <img src="https://i2.wp.com/www.silviagaliana.com/wp-content/uploads/2013/01/Portada-Facebook-Mario-Bros.jpg" class="d-block w-100" alt="banner">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
  <!-- Fin Banner -->
  <!-- Inicio Contenido Principal -->
  <section class="my-5">
    <div class="container">
      <header class="my-5 text-center">
        <h2 class="mb-0">Novedades</h2>
        <p class="text-muted">Explora los productos más nuevos</p>
      </header>
      <div class="row">
      @foreach($productos as $producto)
        <div class="col-md-3">
          <div class="card">
            <img src="{{ Storage::url($producto->imagen) }}" class="card-img-top" alt="producto">
            <div class="card-body">
              <h5 class="card-title text-center">{{$producto->nombre}}</h5>
              <p class="card-text text-center text-danger">S/ {{$producto->precio}}</p>
              <div class="d-grid gap-2">
                <a class="btn btn-primary" href="/producto/{{$producto->url_seo}}">Ver detalle</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>
  <!-- Fin Contenido Principal -->
@endsection