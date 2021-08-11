@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mi cuenta</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<section class="my-5">
    <div class="container">
      <header class="my-5 text-center">
        <h2 class="mb-0">Mi Perfil</h2>
      </header>
      <div class="row">
        <!-- Lista Menú -->
        <div class="col-12 col-md-3">
          <!-- Nav -->
          <nav class="mb-5 mb-md-0">
            <div class="list-group">
              <a href="/cliente/historial" class="list-group-item list-group-item-action" aria-current="true">
                Historial de Pedidos
              </a>
              <a href="/cliente/perfil" class="list-group-item list-group-item-action active">Mi Perfil</a>
            </div>
          </nav>
        </div>
        <!-- Detalle Cliente -->
        <div class="col-12 col-md-9 col-lg-8 offset-lg-1">
            @if(session('mensaje'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <i class="fas fa-info-circle fa-lg"></i> {{ session('mensaje') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- Formulario -->
            <form method="post" action="/cliente/guardar">
              @csrf
              <div class="row">
                <div class="col-12 col-md-6 mb-2">
                  <label class="form-label" for="nombres">Nombres *</label>
                  <input type="text" id="nombres" class="form-control" name="nombres" placeholder="Nombres *" value="{{ Auth::user()->nombres }}" required />
                </div>
                <div class="col-12 col-md-6 mb-2">
                  <label class="form-label" for="dni">DNI *</label>
                  <input type="text" id="dni" class="form-control" name="dni" placeholder="DNI *" value="{{ Auth::user()->dni }}" required />
                </div>
                <div class="col-12 col-md-6 mb-2">
                  <label class="form-label" for="email">Email *</label>
                  <input type="email"  id="email" class="form-control" name="email" placeholder="Email *" value="{{ Auth::user()->email }}" readonly />
                </div>
                <div class="col-12 col-md-6 mb-2">
                  <label class="form-label" for="telefono">Teléfono *</label>
                  <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono *" value="{{ Auth::user()->telefono }}" required />
                </div>
                <div class="col-12 col-md-12 mb-2">
                  <label class="form-label" for="direccion">Dirección *</label>
                  <input type="text" id="direccion" class="form-control" name="direccion" placeholder="Dirección *" value="{{ Auth::user()->direccion }}" required />
                </div>
                <div class="col-12 col-md-6 mb-2">
                  <label class="form-label" for="clave">Contraseña Actual *</label>
                  <input type="password" id="clave" class="form-control" name="clave" placeholder="Contraseña Actual *" />
                </div>
                <div class="col-12 col-md-6 mb-2">
                  <label class="form-label" for="reclave">Nueva Contraseña *</label>
                  <input type="password" id="reclave" class="form-control" name="reclave" placeholder="Nueva Contraseña *" />
                </div>
                <div class="col-12">
                  <button class="btn btn-dark py-2 px-4" type="submit">Guardar cambios</button>
                </div>
              </div>
            </form>

          </div>
      </div>
    </div>
  </section>
<!-- Inicio Contenido -->

<!-- Fin Contenido -->
@endsection