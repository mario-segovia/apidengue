<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasoPositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caso_positivos', function (Blueprint $table) {
            $table->id();
            $table->integer('paciente_id')->unsigned();
            $table->integer('entidad_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('codigo');
            $table->text('region');
            $table->integer('codigo_distrito');
            $table->text('distrito');
            $table->text('fecha_notificacion');
            $table->text('medico');
            $table->integer('media_edad');
            $table->text('residente');
            $table->text('hospedaje');
            $table->integer('telefono_verificado');
            $table->integer('codigo_departamento');
            $table->text('departamento');
            $table->text('zona');
            $table->text('personal_de_blanco');
            $table->text('albergue');
            $table->text('lugar_albergue');
            $table->text('sintomas_fiebre');
            $table->text('hospitalizado');
            $table->text('signo_sintoma');
            $table->text('vacuna_para_la_influenza');
            $table->text('fecha_vacunacion');
            $table->text('viajo_reciente');
            $table->text('centro_asistencia_covid');
            $table->text('centro_asistencia_pais');
            $table->text('centro_asistencia_ciudad');
            $table->text('nombre_centro_asistencia');
            $table->text('fecha_asistida');
            $table->text('contacto_con_animales');
            $table->text('contacto_persona');
            $table->text('tipo_contacto');
            $table->text('contacto_otro');
            $table->text('contacto_con_infectado');
            $table->text('dato_de_contacto');
            $table->text('toma_de_muestra');
            $table->text('laboratorio');
            $table->text('nro_planilla');
            $table->text('anho');
            $table->text('responsable_de_carga');
            $table->text('usuario_lugar');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('entidad_id')->references('id')->on('entidads');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caso_positivos');
    }
}
