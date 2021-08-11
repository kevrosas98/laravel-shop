@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pago</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<!-- Inicio Contenido -->
<section class="my-5">
    <div class="container">
      <header class="my-5 text-center">
        <h2 class="mb-0">Pago</h2>
      </header>
      <!-- INICIO FORMULARIO -->
      <form method="post" action="/procesar">
        @csrf
        <div class="row">
          <div class="col-12 col-md-7">
            <h5 class="mb-4 fw-bold">Detalles de Envío</h5>
            <hr class="my-3 text-muted">
            <!-- Detalles de facturación -->
            <div class="row">
              <div class="col-12 col-md-12 mb-3">
                <label for="envio" class="form-label">Forma de Envío *</label>
                <select id="envio" class="form-control" onchange="validarEnvio(this.value)" name="envio" required >
                  <option value="">Seleccione una opción</option>
                  <option value="D">Delivery</option>
                  <option value="L">Recojo en tienda</option>
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="direccion" class="form-label">Dirección *</label>
                <input type="direccion" id="direccion" class="form-control" name="direccion"  placeholder="Dirección *" disabled required />
              </div>
            </div>

            <!-- Métodos de pago -->
            <h5 class="mb-4 fw-bold">Forma de Pago</h5>
            <!-- List group -->
            <div class="list-group mb-4">
              <div class="list-group-item">
                <div class="form-check py-2">
                  <input class="form-check-input" type="radio" name="pago" value="E" id="pago1" required />
                  <label class="form-check-label" for="pago1">
                    Efectivo
                  </label>
                </div>
              </div>
              <div class="list-group-item">
                <div class="form-check py-2">
                  <input class="form-check-input" type="radio" name="pago" value="P" id="pago2" required />
                  <label class="form-check-label" for="pago2">
                    POS <img src="img/cards.svg" alt="tarjeta" />
                  </label>
                </div>
              </div>
              <div class="list-group-item">
                <div class="form-check py-2">
                  <input class="form-check-input" type="radio" name="pago" value="L" id="pago3" required />
                  <label class="form-check-label" for="pago3">
                    Pago en línea <img src="img/cards.svg" alt="tarjeta" />
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- INICIO DETALLE PEDIDO -->
          <div class="col-12 col-md-5 col-lg-4 offset-lg-1">
            <!-- Heading -->
            <h5 class="mb-4 fw-bold">Detalle pedido ({{ count(session('carrito')) }})</h5>
            <!-- Divider -->
            <hr class="my-3 text-muted">
            <!-- List group -->
            <ul class="list-group list-group-flush mb-5">
            @php $total = 0 @endphp
            @foreach(session('carrito') as $id => $producto)
              <li class="list-group-item">
                <div class="row my-3">
                  <div class="col-4">
                    <a href="producto.html">
                      <img src="https://via.placeholder.com/285x180/?text=Producto" alt="producto" class="img-fluid">
                    </a>
                  </div>
                  <div class="col">
                    <p class="mb-4 font-size-sm font-weight-bold">
                      <a class="text-body" href="/producto/{{ $producto['url_seo'] }}">{{ $producto['nombre'] }}</a> <br>
                      <span class="text-muted">S/ {{ number_format($producto['precio'],2) }} x {{ $producto['cantidad'] }}</span>
                    </p>
                  </div>
                </div>
              </li>
              @php $total += $producto['total'] @endphp
            @endforeach
            </ul>
            <!-- Totales -->
            <div class="card mb-5 bg-light border-0">
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-light">
                    <div class="d-flex justify-content-between my-2">
                      <span>Subtotal</span> <span class="ml-auto font-size-sm">S/ {{ number_format($total*0.82,2) }}</span>
                    </div>
                  </li>
                  <li class="list-group-item bg-light">
                    <div class="d-flex justify-content-between my-2">
                      <span>IGV</span> <span class="ml-auto font-size-sm">S/ {{ number_format($total*0.18,2) }}</span>
                    </div>
                  </li>
                  <li class="list-group-item bg-light">
                    <div class="d-flex justify-content-between my-2">
                      <span>Delivery</span> <span class="ml-auto font-size-sm">S/ 0.00</span>
                    </div>
                  </li>
                  <li class="list-group-item bg-light">
                    <div class="d-flex justify-content-between fs-5 fw-bold my-2">
                      <span>Total</span> <span class="ml-auto">S/ {{ number_format($total,2) }}</span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <p class="mb-5 text-muted">
              Sus datos personales se utilizarán para procesar su pedido, soporte
              su experiencia en este sitio web y para otros fines
              descrito en nuestra política de privacidad.
            </p>
            <div class="d-grid gap-2">
              <button class="btn btn-danger py-3">Realizar Pedido</button>
            </div>
          </div>
        </div>
      </form>
      <!-- FIN FORMULARIO -->
    </div>
  </section>
<!-- Fin Contenido -->

<script>
function validarEnvio(valor){
  cajaTexto = document.getElementById('direccion');
  if(valor=='D'){
    cajaTexto.disabled = "";
    cajaTexto.value = "{{ Auth::user()->direccion }}";
  }else{
    cajaTexto.disabled = "disabled";
    cajaTexto.value = "";
  }
}
</script>
@endsection