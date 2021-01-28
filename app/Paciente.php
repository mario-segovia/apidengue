<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Paciente extends Model
{
  use SoftDeletes;

  public $table = 'pacientes';
  
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
      'resultado',
      'usuario',
      'tipo_prueba_id'
      
  ];
  protected $casts = [
       
        'id' => 'integer',
        
        'nombre_apellido' => 'string',
        'genero' => 'string',
        'fechanac' => 'string',
        'edad' => 'integer',
        'ci' => 'integer',
        'barrio' => 'string',
        'telefono' => 'integer',
        'grupo_sanguineo' => 'string',
        'enfermedad_referencial' => 'string',
        'latitud' => 'string',
        'longitud' => 'string',
        'email' => 'string',
        'resultado' => 'string',
        'usuario' => 'string',
        'tipo_prueba_id' => 'integer',
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
