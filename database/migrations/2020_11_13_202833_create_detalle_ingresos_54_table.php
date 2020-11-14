<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngresos54Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos_54', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_ingreso');
            $table->foreign('id_ingreso')->references('id')->on('ingresos_54')->onDelete('cascade');

            $table->unsignedBigInteger('id_articulo');
            $table->foreign('id_articulo')->references('id')->on('articulos_54')->onDelete('cascade');

            $table->integer('cantidad');
            $table->float('precio');

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
        Schema::dropIfExists('detalle_ingresos_54');
    }
}
