<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
  //
  // protected $fillable = ['model_name'];

    public function watch()
    {
      return $this->belongsTo(Watch::class);
    }


}
