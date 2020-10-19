<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Control extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  public $fillable = [
        'paciente_id',
        'fecha_analisis',
        'estado_paciente',
        'recomendacion',
        'fecha_alta'
    ];

    public function caso_positivo (){
        return $this-> belongsTo('App\Caso_positivo');
    }

}
