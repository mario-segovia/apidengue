<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Denuncia extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'id_user',
      'den_tipo',
      'den_alt',
      'den_long',
      'den_foto'
  ];
  public function user (){
      return $this-> belongsTo('App\User');
  }
}
