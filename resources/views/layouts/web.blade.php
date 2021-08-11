<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <title>CodiGo Store</title>
  <link rel="stylesheet" type="text/css" href="/assets/fontawesome-5.15.3/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="/css/estilos.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand" href="/">KGameStore</a>
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Nav -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
          </li>
          @foreach(Util::menuSuperior() as $menu)
          <li class="nav-item">
              <a class="nav-link" href="/catalogo/{{ $menu->url_seo }}">{{$menu->nombre}}</a>
          </li>
          @endforeach
        </ul>
        <!-- Nav -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <form class="mb-lg-0 me-lg-3">
              <input type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar">
            </form>
          </li>
          <li class="nav-item mb-lg-0 me-lg-3">
            @if(Auth::check())
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->nombres }}
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/cliente/perfil">Mi Perfil</a></li>
                <li><a class="dropdown-item" href="/cliente/historial">Historial de Pedidos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/registro/logout">Cerrar Sesión</a></li>
              </ul>
            </div>
            @else
            <a href="/registro" class="btn btn-outline-secondary"><i class="fa fa-user"></i> Ingresar</a>
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="offcanvas" aria-controls="offcanvasRight" href="#offcanvasRight">
              <i class="fa fa-shopping-cart"></i> ({{Util::carrito()}} productos)
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- INICIO PRINCIPAL -->
  @yield('contenido')
  <!-- FIN PRINCIPAL-->

  <section class="bg-light">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center p-4 w-100">
            <i class="fas fa-truck fa-lg"></i>
            <div class="ms-3">
              <h6 class="mb-1 text-uppercase">Envío gratis</h6>
              <p class="small text-muted mb-0">Para todos los pedidos superiores a S/99.00</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center p-4 w-100">
            <i class="fas fa-exchange-alt fa-lg"></i>
            <div class="ms-3">
              <h6 class="mb-1 text-uppercase">30 días de devolución</h6>
              <p class="small text-muted mb-0">Si los productos tienen problemas</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center p-4 w-100">
            <i class="fas fa-shield-alt fa-lg"></i>
            <div class="ms-3">
              <h6 class="mb-1 text-uppercase">Pago seguro</h6>
              <p class="small text-muted mb-0">Pago 100% seguro</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center p-4 w-100">
            <i class="fas fa-phone-alt fa-lg"></i>
            <div class="ms-3">
              <h6 class="mb-1 text-uppercase">Soporte 24/7</h6>
              <p class="small text-muted mb-0">Soporte dedicado</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-4 col-sm-12 mb-3 mb-md-0">
          <span class="text-white">CodiGo Store</span>
          <p class="text-muted">Aceptamos todas las tarjetas</p>
          <ul class="list-inline">
            <li class="list-inline-item"><i class="fab fa-cc-visa text-white"></i></li>
            <li class="list-inline-item"><i class="fab fa-cc-mastercard text-white"></i></li>
            <li class="list-inline-item"><i class="fab fa-cc-discover text-white"></i></li>
            <li class="list-inline-item"><i class="fab fa-cc-paypal text-white"></i></li>
            <li class="list-inline-item"><i class="fab fa-cc-amex text-white"></i></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
          <h6 class="text-white">Nosotros</h6>
          <ul class="list-unstyled text-muted mb-0">
            <li class="mb-2"><a class="reset-anchor" href="#">Inicio</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Quiénes Somos</a></li>
            <li class="mb-2"><a class="reset-anchor" href="#"></a></li>
            <li class="mb-2"><a class="reset-anchor" href="#">Contáctanos</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
          <h6 class="text-white">Atención al Cliente</h6>
          <ul class="list-unstyled text-muted mb-0">
            <li class="mb-2"> <a class="reset-anchor" href="#">Mi Cuenta</a></li>
            <li class="mb-2"> <a class="reset-anchor" href="#">Preguntas Frecuentes</a></li>
            <li class="mb-2"> <a class="reset-anchor" href="#">Términos y condiciones</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-12 mb-3 mb-md-0">
          <p class="lead mb-1 text-white">Telf: (+51) 123 4567</p>
          <p class="text-muted">Av. Las Palemeras 128 Int 102<br/>Los Olivos - Lima</p>
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a class="social-icon" href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a class="social-icon" href="#"><i class="fab fa-youtube"></i></a></li>
            <li class="list-inline-item"><a class="social-icon" href="#"><i class="fab fa-pinterest"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="border-top py-4" style="border-color: #1d1d1d !important">
        <div class="row">
          <div class="col-lg-6">
            <p class="small text-muted mb-0">© 2021 Todos los derechos reservados.</p>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p class="small text-muted mb-0">Desarrollado por <a class="text-white reset-anchor" href="https://codigo.edu.pe" target="_blank">CodiGo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Inicio Carrito Lateral -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">Carrito de compras</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group list-group-lg list-group-flush">
      @php $total = 0 @endphp
      @foreach(session('carrito',[]) as $id => $producto)
        <li class="list-group-item">
          <div class="row">
            <div class="col-4">
              <!-- Image -->
              <a href="/producto/{{$producto['url_seo']}}">
                <img class="img-fluid" src="{{ Storage::url($producto['imagen']) }}" alt="producto">
              </a>
            </div>
            <div class="col-8">
              <!-- Title -->
              <p class="font-size-sm font-weight-bold mb-6">
                <a class="text-body" href="/producto/{{$producto['url_seo']}}">{{$producto['nombre']}}</a> <br>
                <span class="text-muted">S/ {{$producto['precio']}}</span>
              </p>
              <!--Footer -->
              <div class="d-flex justify-content-between">
                <!-- Select -->
                <select class="custom-select custom-select-xxs w-auto" disabled >
                  <option value="1">{{$producto['cantidad']}}</option>
                </select>
                <!-- Remove -->
                <a class="font-size-xs text-gray-400 ml-auto" href="/carrito/eliminar/{{$id}}">
                  <i class="fas fa-times"></i> Eliminar
                </a>
              </div>
            </div>
          </div>
        </li>
        @php $total += $producto['total'] @endphp
      @endforeach
      @if(!$total)
        <li class="list-group-item text-center">No hay productos</li>
      @endif
      </ul>
      <div class="line-height-fixed font-size-sm bg-light p-4 d-flex justify-content-between">
        <strong>Subtotal</strong> <strong class="ml-auto">S/ {{$total}}</strong>
      </div>
      <div class="d-grid gap-2">
        <a class="btn btn-dark" href="/pago">Pagar</a>
        <a class="btn btn-outline-dark" href="/carrito">Ver carrito</a>
      </div>
    </div>
  </div>
  <!-- Fin Carrito Lateral -->

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="vendor/swiper-6.4.11/swiper-bundle.min.js"></script>
  <script src="/js/main.js"></script>
</body>
</html>