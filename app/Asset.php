<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;
    protected $fillable = [
      'name',
      'created_at',
      'updated_at',
      'deleted_at',
      'description',
      'danger_level',
  ];
}
