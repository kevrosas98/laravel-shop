<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>KGameStore - Admin</title>
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/">KGameStore Admin</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>  {{ Auth::guard('admin')->user()->name }}</a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{ route('perfil.index', Auth::guard('admin')->user()->id) }}">Mi perfil</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li>
            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Cerrar Sesión
            </a>
            <form id="logout-form" action="/admin/salir" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
          @if(Auth::user()->role=='A')
            <div class="sb-sidenav-menu-heading">Sistema</div>
            <a class="nav-link" href="{{ route('usuario.index') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
              Usuarios
            </a>
          @endif
            <a class="nav-link" href="{{ route('inicio.admin') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Almacen</div>
            <a class="nav-link" href="{{ route('categoria.index') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
              Categorías
            </a>
            <a class="nav-link" href="{{ route('producto.index') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
              Productos
            </a>
            <div class="sb-sidenav-menu-heading">Personas</div>
            <a class="nav-link" href="{{ route('clienteadm.index') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
              Clientes
            </a>
            <div class="sb-sidenav-menu-heading">Pedidos</div>
            <a class="nav-link" href="{{ route('venta.index') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
              Ventas
            </a>
            <div class="sb-sidenav-menu-heading">Configuracion</div>
            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
              Medios de Pago
            </a>
            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
              Medios de Envio
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Conectado como:</div>
          {{ Auth::user()->getRole() }}
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          @yield('contenido')
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; CodiGo 2021</div>
            <div class="text-muted">
              Powered by Tecsup
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="/js/scripts.js"></script>
  <script>
    function url() {
        let name = document.getElementById("nombre").value;
            name = name.toLowerCase().replace(/ /g, '-');
        //Se actualiza en municipio inm
        document.getElementById("seo").value = name;
		}
  </script>
</body>

</html>