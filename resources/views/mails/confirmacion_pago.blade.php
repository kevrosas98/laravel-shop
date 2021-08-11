<h1>Confirmación del Pedido</h1>
<p>Estimado cliente, gracias por su compra.</p>
<h3>Detalle del Pedido</h3>
<ul>
    @foreach($pedido->venta_productos as $detalle)
    <li>
        <strong>{{ $detalle->producto->nombre }}</strong><br/>
        {{ $detalle->cantidad }} x {{ number_format($detalle->precio,2) }} = S/ {{ number_format($detalle->total,2) }}
    </li>
    @endforeach
</ul>
<hr/>
<p><strong>Subtotal:</strong> S/ {{ number_format($pedido->total*0.82,2) }}</p>
<p><strong>IGV:</strong> S/ {{ number_format($pedido->total*0.18,2) }}</p>
<p><strong>Total:</strong> S/ {{ number_format($pedido->total,2) }}</p>
