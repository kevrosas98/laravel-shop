<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('categoria_id');
            $table->string('nombre',100);
            $table->string('imagen',100);
            $table->text('descripcion')->nullable();
            $table->string('url_seo',200)->unique();
            $table->float('precio');
            $table->integer('existencias');
            $table->char('portada',1);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('estado',1)->default('A');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
