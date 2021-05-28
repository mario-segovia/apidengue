<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

  protected $fillable = [
      'stock',
      'team_id',
      'user_id',
      'asset_id',
      'created_at',
      'updated_at',
      'deleted_at',
  ];

  protected $casts = [
      'created_at' => 'datetime:d-m-Y','updated_at'=> 'datetime:d-m-Y'
  ];

  public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');

    }

    public function team()
    {
        return $this->belongsTo(Entidad::class, 'team_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

}
