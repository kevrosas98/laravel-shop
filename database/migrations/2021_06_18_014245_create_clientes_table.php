<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nombres',100);
            $table->string('dni',8)->nullable();
            $table->char('telefono',11)->nullable();
            $table->string('direccion',150)->nullable();
            $table->string('email',100)->unique();
            $table->string('password',100);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('estado',1)->default('A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
