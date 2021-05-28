<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'localidad',
        'direccion',
        'telefono',
        'email',
        'observaciones'
    ];

    public function usuario (){
          return $this-> hasMany('App\Usuario');
      }
      public function caso_positivo (){
            return $this-> hasMany('App\Caso_positivo');
      }

      public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
