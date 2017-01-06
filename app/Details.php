<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{

  protected $fillable = ['info'];

    public function watch()
    {
      return $this->belongsTo(Watch::class);
    }
}
