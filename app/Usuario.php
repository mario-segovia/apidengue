<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'nombre',
      'apellido',
      'distrito',
      'direccion',
      'telefono',
      'email',
      'observaciones',
      'id_rol',
      'id_entidad'
  ];

    
    public function entidad (){
        return $this-> belongsTo('App\Entidad');
    }
}
