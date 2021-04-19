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
            $table->bigIncrements('idpr')->comment('Numero identificador de productos');
            $table->string('nombre',10)->comment('Nombre de productos');
            $table->integer('existencia')->comment('Numero de existencias deproducto');
            $table->text('descripcion')->comment('Descripcion del producto');
            $table->double('precio')->comment('Precio del producto');
            $table->string('img')->comment('imagen del producto');
            $table->unsignedBigInteger('idc')->comment('Numero identificador de categoria');
            $table->foreign('idc')->references('idc')->on('categorias');
            $table->timestamps();
            $table->softDeletes();
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
