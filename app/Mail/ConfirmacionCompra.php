<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCompra extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $venta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // Pasamos la $venta que acabamos de realizar
    public function __construct($venta)
    {
        //lo asignamos al atributo venta de la clase ConfirmacionCompra
        $this->venta = $venta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Accedo al id de la venta actual, y la relleno con 8 ceros
        $nro_pedido = sprintf('%08d', $this->venta->id);
        return $this->view('mails.confirmacion_pago')
            ->subject("Confirmación del Pedido Nro $nro_pedido") // Asunto del correo
            ->with(['pedido'=>$this->venta]); //Pasamos el dato de la venta a la vista
    }
}
