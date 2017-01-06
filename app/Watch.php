<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    public function details()
    {
      return $this->hasMany(Details::class); 
    }
}
