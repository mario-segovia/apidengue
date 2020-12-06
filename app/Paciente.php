<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Paciente extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'nombre_apellido',
      'genero',
      'fechanac',
      'edad',
      'ci',
      'barrio',
      'telefono',
      'grupo_sanguineo',
      'enfermedad_referencial',
      'latitud',
      'longitud',
      'email',
      'resultado'
  ];

  public function caso_positivo (){
        return $this-> hasMany('App\Caso_positivo');
    }

    public function user (){
        return $this-> belongsTo('App\User');
    }

    public function tipo_prueba (){
        return $this-> belongsTo('App\TipoPrueba');
    }
}
