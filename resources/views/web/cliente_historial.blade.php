@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Historial de Pedidos</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<!-- Inicio Contenido -->
<section class="my-5">
    <div class="container">
      <header class="my-5 text-center">
        <h2 class="mb-0">Historial de Pedidos</h2>
      </header>
      <div class="row">
        <!-- Lista Menú -->
        <div class="col-12 col-md-3">
          <!-- Nav -->
          <nav class="mb-5 mb-md-0">
            <div class="list-group">
              <a href="/cliente_/historial" class="list-group-item list-group-item-action active" aria-current="true">
                Historial de Pedidos
              </a>
              <a href="/cliente/perfil" class="list-group-item list-group-item-action">Mi Perfil</a>
            </div>
          </nav>
        </div>
        <!-- Lista Pedidos -->
        <div class="col-12 col-md-9 col-lg-8 offset-lg-1">
          <!-- Inicio Pedido -->
          @foreach($pedidos as $pedido)
          <div class="card mb-5 border">
            <div class="card-body">
              <!-- Info -->
              <div class="card">
                <div class="card-body bg-light">
                  <div class="row">
                    <div class="col-6 col-lg-2">
                      <h6 class="text-muted">Pedido No:</h6>
                      <p class="mb-lg-0 fw-bold">
                        {{ sprintf('%08d', $pedido->id) }}
                      </p>
                    </div>
                    <div class="col-6 col-lg-2">
                      <h6 class="text-muted">Fecha de envío:</h6>
                      <p class="mb-lg-0 fw-bold">
                        <time datetime="2019-10-01">
                         {{ Util::formatoFecha($pedido->fecha_registro) }}
                        </time>
                      </p>
                    </div>
                    <div class="col-6 col-lg-3">
                      <h6 class="text-muted">Estado:</h6>
                      <p class="mb-0 fw-bold">
                       {{ Util::formatoEstado($pedido->estado) }}
                      </p>
                    </div>
                    <div class="col-6 col-lg-3">
                      <h6 class="text-muted">Monto del pedio:</h6>
                      <p class="mb-0 fw-bold">
                        S/ {{ number_format($pedido->total,2) }}
                      </p>
                    </div>
                    <div class="col-12 col-lg-2 mt-xs-3">
                      <a class="btn btn-sm btn-outline-success mb-md-2" href="/cliente/pedido/{{ $pedido->id }}">
                        Ver Detalle
                      </a>
                      <a class="btn btn-sm btn-outline-info" href="#!">
                        Tracking
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- Fin Pedido -->

          <!-- Paginación -->
          <nav class="d-flex justify-content-center justify-content-md-end mt-10">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-left"></i>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">6</a>
              </li>
              <li class="page-item">
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-right"></i>
                </a>
              </li>
            </ul>
          </nav>

        </div>
      </div>
    </div>
  </section>
<!-- Fin Contenido -->
@endsection