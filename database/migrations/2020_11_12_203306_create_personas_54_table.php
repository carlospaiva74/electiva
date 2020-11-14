<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonas54Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_54', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('tipo_documento',20);
            $table->string('num_documento',20);
            $table->string('direccion',70);
            $table->string('telefono',20);
            $table->string('email',50);
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
        Schema::dropIfExists('personas_54');
    }
}
