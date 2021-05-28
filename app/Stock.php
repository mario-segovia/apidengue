<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'team_id',
        'asset_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'current_stock',
    ];

    public function asset()
  {
      return $this->belongsTo(Asset::class, 'asset_id');

  }

  public function team()
  {
      return $this->belongsTo(Entidad::class, 'team_id');

  }

}
