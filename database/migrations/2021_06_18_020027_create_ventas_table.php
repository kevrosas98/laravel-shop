<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('cliente_id');
            $table->char('forma_envio',1)->comment('D:delivery | L:recojo en local');
            $table->char('forma_pago',1)->comment('E:efectivo | P:pos | L:en línea');
            $table->string('direccion',150);
            $table->string('codigo_transaccion',45)->nullable();
            $table->float('total');
            $table->char('pago',1)->comment('0:no pagado | 1:pagado');
            $table->datetime('fecha_pago')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->char('estado',1)->comment('P:pendiente | E:entregado | N:anulado');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
