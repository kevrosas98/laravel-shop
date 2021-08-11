@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<section class="py-5">
      <div class="container px-5">
        <div class="row px-md-5">
          @if(session('mensaje'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle fa-lg"></i> {{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <!-- INICIO LOGIN -->
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body p-md-5">
                <h5 class="mb-3 fw-bold">Soy Cliente</h5>
                <form method="post" action="/registro/login">
                  @csrf
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico *" required />
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="clave" placeholder="Contraseña *" required />
                  </div>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Recuérdame</label>
                    </div>
                    <a class="font-size-sm text-reset" data-toggle="modal" href="#modalPasswordReset">¿Has olvidado tu contraseña?</a>
                  </div>
                  <div>
                    <button class="btn btn-dark px-3 py-2" type="submit">Ingresar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- FIN LOGIN -->
          <!-- INICIO REGISTRO -->
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body p-md-5">
                <h5 class="mb-3 fw-bold">Nuevo cliente</h5>
                <!-- Form -->
                <form method="post" action="/registro/nuevo">
                  @csrf
                  <div class="mb-3">
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres *" required />
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico *" required />
                  </div>
                  <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="password" class="form-control" name="clave" placeholder="Contraseña *" required />
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="password" class="form-control" name="reclave" placeholder="Confirmar contraseña *" required />
                    </div>
                  </div>
                  <div class="text-muted mb-3">
                    Al registrar sus datos, acepta nuestros Términos y condiciones y Política de privacidad y cookies.
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">¡Darse de alta en el boletín de noticias! </label>
                  </div>
                  <div>
                    <button class="btn btn-dark px-3 py-2" type="submit">Crea cuenta</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- FIN REGISTRO -->
        </div>
      </div>
    </section>
<!-- Inicio Contenido -->

<!-- Fin Contenido -->
@endsection