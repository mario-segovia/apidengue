<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Noticia extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'titulo',
      'descripcion',
      'imagen',
      'enlace_fuente'
  ];

  protected $casts = [
      'created_at' => 'datetime:d-m-Y','updated_at'=> 'datetime:d-m-Y'
  ];
}
