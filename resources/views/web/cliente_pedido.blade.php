@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="/cliente/historial">Historial de Pedidos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detalle del Pedidos</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<!-- Inicio Contenido -->
<section class="my-5">
    <div class="container">
      <header class="my-5 text-center">
        <h2 class="mb-0">Detalle del Pedido</h2>
      </header>
      <div class="row">
        <!-- Lista Menú -->
        <div class="col-12 col-md-3">
          <!-- Nav -->
          <nav class="mb-5 mb-md-0">
            <div class="list-group">
              <a href="/cliente/historial" class="list-group-item list-group-item-action active" aria-current="true">
                Mis Pedidos
              </a>
              <a href="/cliente/perfil" class="list-group-item list-group-item-action">Mi Perfil</a>
            </div>
          </nav>
        </div>
        <!-- Detalle Pedido -->
        <div class="col-12 col-md-9 col-lg-8 offset-lg-1">

          <!-- Order -->
          <div class="card mb-5 border">
            
            <div class="card-body">
              <!-- Info -->
              <div class="card">
                <div class="card-body bg-light">
                  <div class="row">
                    <div class="col-6 col-lg-3">
                      <h6 class="text-muted">Pedido No:</h6>
                      <p class="mb-lg-0 fw-bold">{{ sprintf('%08d', $pedido->id) }}</p>
                    </div>
                    <div class="col-6 col-lg-3">
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
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body">
              <!-- Heading -->
              <h5 class="mb-4">Detalle Pedido ({{ count($pedido->venta_productos) }})</h5>
              <!-- Divider -->
              <hr class="my-4">
              <!-- List group -->
              <ul class="list-group list-group-flush">
                @foreach($pedido->venta_productos as $detalle)
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-4 col-md-3 col-xl-2">
                      <!-- Image -->
                      <a href="producto.html"><img src="https://via.placeholder.com/285x180/?text=Producto" alt="producto" class="img-fluid"></a>
                    </div>
                    <div class="col">
                      <!-- Title -->
                      <p class="mb-4 fw-bold">
                        <a class="text-body" href="producto.html">{{ $detalle->producto->nombre }} x {{ $detalle->cantidad }}</a> <br>
                        <span class="text-muted">S/ {{ number_format($detalle->precio,2) }}</span>
                      </p>
                    </div>
                    <div class="col text-end">
                      S/ {{ number_format($detalle->total,2) }}
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>

            </div>
          </div>

          <!-- Detalle Total -->
          <div class="card mb-5 border">
            <div class="card-body">
              <!-- Heading -->
              <h5 class="mb-4">Order Total</h5>
              <!-- List group -->
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                  <span>Subtotal</span>
                  <span class="ml-auto">S/ {{ number_format($pedido->total*0.82,2) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>IGV</span>
                  <span class="ml-auto">S/ {{ number_format($pedido->total*0.18,2) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>Delivery</span>
                  <span class="ml-auto">S/ 0.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between fw-bold">
                  <span>Total</span>
                  <span class="ml-auto">S/ {{ number_format($pedido->total,2) }}</span>
                </li>
              </ul>

            </div>
          </div>

          <!-- Detalles -->
          <div class="card border">
            <div class="card-body">
              <!-- Heading -->
              <h5 class="mb-4">Facturación &amp; Detalles de envío</h5>
              <!-- Content -->
              <div class="row">
                <div class="col-12 col-md-4">
                  <!-- Heading -->
                  <p class="mb-3 fw-bold">
                    Dirección de Envío:
                  </p>
                  <p class="mb-3 mb-md-0 text-muted">
                    {{ $pedido->direccion }}
                  </p>
                </div>
                <div class="col-12 col-md-4">
                  <!-- Heading -->
                  <p class="mb-3 fw-bold">
                    Método de Envío:
                  </p>
                  <p class="mb-3 text-muted">
                     {{ Util::formaEnvio($pedido->forma_envio) }}
                  </p>
                </div>
                <div class="col-12 col-md-4">
                  <!-- Heading -->
                  <p class="mb-3 fw-bold">
                    Método de Pago:
                  </p>
                  <p class="mb-0 text-muted">
                    {{ Util::formaPago($pedido->forma_pago) }}
                  </p>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
<!-- Fin Contenido -->
@endsection