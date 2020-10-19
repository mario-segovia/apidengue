<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->integer('paciente_id')->unsigned();
            $table->text('fecha_analisis');
            $table->text('estado_paciente');
            $table->text('recomendacion');
            $table->text('fecha_alta');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('paciente_id')->references('id')->on('caso_positivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controls');
    }
}
