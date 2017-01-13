<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{

  protected $fillable = ['case_size', 'dial_colour', 'movement_type', 'case_material'];


    public function models()
    {
      return $this->belongsTo(Models::class);
    }




}
