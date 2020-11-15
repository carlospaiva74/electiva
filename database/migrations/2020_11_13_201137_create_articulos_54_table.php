<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulos54Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_54', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias_54')->onDelete('cascade');

            $table->string('codigo',50);
            $table->string('nombre',100);
            $table->float('precio_venta');
            $table->integer('stock');
            $table->string('descripcion',256);
            //$table->integer('condicion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_54');
    }
}
