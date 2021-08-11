@extends('layouts.web')

@section('contenido')
<!-- Inicio Título -->
<section class="bg-light">
    <div class="container py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 px-0">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Carrito de compras</li>
        </ol>
      </nav>
    </div>
  </section>
<!-- Fin Título -->
<!-- Inicio Contenido -->
<section class="my-5">
    <div class="container">
      <header class="my-5 text-center">
        <h2 class="mb-0">Carrito de compras</h2>
      </header>
      <div class="table-responsive mb-4">
        <table class="table">
          <thead class="bg-light">
            <tr>
              <th class="p-3 border-0" scope="col"><strong class="text-uppercase">Producto</strong></th>
              <th class="p-3 border-0" scope="col"><strong class="text-uppercase">Precio</strong></th>
              <th class="p-3 border-0" scope="col"><strong class="text-uppercase">Cantidad</strong></th>
              <th class="p-3 border-0" scope="col"><strong class="text-uppercase">Total</strong></th>
              <th class="p-3 border-0" scope="col"><strong class="text-uppercase"></strong></th>
            </tr>
          </thead>
          <tbody>
          @php $total = 0 @endphp
          @foreach(session('carrito',[]) as $id => $producto)
            <tr>
              <th class="p-3 pl-0 border-0" scope="row">
                <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="/producto/{{$producto['url_seo']}}"><img src="{{ Storage::url($producto['imagen']) }}" alt="producto" width="70"></a>
                  <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="/producto/{{$producto['url_seo']}}">{{$producto['nombre']}}</a></strong></div>
                </div>
              </th>
              <td class="p-3 align-middle border-0">
                <p class="mb-0 small">S/ {{$producto['precio']}}</p>
              </td>
              <td class="p-3 align-middle border-0">
                <div class="border d-inline-block px-2">
                  <div class="quantity">
                    <button class="dec-btn p-0" onclick="decrease(this)"><i class="fas fa-caret-left"></i></button>
                    <input class="form-control border-0 shadow-0 p-0 quantity-result" type="text" value="{{$producto['cantidad']}}">
                    <button class="inc-btn p-0" onclick="increase(this)"><i class="fas fa-caret-right"></i></button>
                  </div>
                </div>
              </td>
              <td class="p-3 align-middle border-0">
                <p class="mb-0 small">S/ {{$producto['total']}}</p>
              </td>
              <td class="p-3 align-middle border-0">
                <a href="/carrito/eliminar/{{$id}}" class="reset-anchor" ><i class="fas fa-trash-alt small text-muted"></i></a>
              </td>
            </tr>
            @php $total += $producto['total'] @endphp
          @endforeach
          @if(!$total)
            <tr><td colspan="5" style="text-align:center">No hay productos</td></tr>
          @endif
          </tbody>
        </table>
        <!-- Cart footer-->
        <div class="bg-light p-4">
          <div class="row align-items-center">
            <div class="col-md-6">
              <ul class="list-inline mb-0">
                <li class="list-inline-item py-1"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"> <i class="fas fa-shopping-bag me-2"></i>Seguir comprando</a></li>
                <li class="list-inline-item py-1"><a class="btn btn-primary" href="/pago"> <i class="far fa-credit-card me-2"></i>Proceso de pago</a></li>
              </ul>
            </div>
            <div class="col-md-6 text-start text-md-end">
              <p class="text-muted mb-1">Total del carrito</p>
              <h6 class="h4 mb-0">S/ {{$total}}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Fin Contenido -->
@endsection
