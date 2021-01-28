<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caso_positivo extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  public $fillable = [
        'paciente_id',
        'codigo',
        'region',
        'codigo_distrito',
        'distrito',
        'fecha_notificacion',
        'medico',
        'media_edad',
        'residente',
        'hospedaje',
        'telefono_verificado',
        'codigo_departamento',
        'departamento',
        'zona',
        'personal_de_blanco',
        'albergue',
        'lugar_albergue',
        'sintomas_fiebre',
        'hospitalizado',
        'signo_sintoma',
        'vacuna_para_la_influenza',
        'fecha_vacunacion',
        'viajo_reciente',
        'centro_asistencia_covid',
        'centro_asistencia_pais',
        //no guarda
        'centro_asistencia_ciudad',
        //no guarda
        'nombre_centro_asistencia',
        'fecha_asistida',
        'contacto_con_animales',
        'contacto_persona',
        'tipo_contacto',
        'contacto_otro',
        'contacto_con_infectado',
        'dato_de_contacto',
        'toma_de_muestra',
        'laboratorio',
        'nro_planilla',
        //no guarda
        'anho',
        'responsable_de_carga',
        'usuario_lugar'
    ];

    public function paciente (){
        return $this-> belongsTo('App\Paciente');
    }
    public function entidad (){
        return $this-> belongsTo('App\Entidad');
    }
    public function user (){
        return $this-> belongsTo('App\User');
    }

    public function usuario (){
          return $this-> hasMany('App\Control');
      }
}
