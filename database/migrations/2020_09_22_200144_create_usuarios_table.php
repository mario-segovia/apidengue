<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('distrito');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('observaciones');
            //$table->integer('id_rol')->unsigned();
            $table->integer('id_entidad')->unsigned();
            $table->softDeletes();
            //$table->foreign('id_rol')->references('id')->on('roles');
            $table->foreign('id_entidad')->references('id')->on('entidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
