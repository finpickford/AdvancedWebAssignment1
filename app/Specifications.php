<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{


    public function models()
    {
      return $this->belongsTo(Models::class);
    }




}
