<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sugerencia extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'id_user',
      'sug_descripcion'
  ];
  public function user (){
      return $this-> belongsTo('App\User');
  }
}
