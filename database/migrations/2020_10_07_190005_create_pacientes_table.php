<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellido');
            $table->string('genero');
            $table->string('fechanac');
            $table->integer('edad');
            $table->integer('ci');
            $table->string('barrio');
            $table->integer('telefono');
            $table->string('grupo_sanguineo');
            $table->text('enfermedad_referencial');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('email');
            $table->string('resultado');
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
        Schema::dropIfExists('pacientes');
    }
}
