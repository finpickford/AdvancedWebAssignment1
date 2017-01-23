<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{

  // Make the case size, dial colour, movement type and case material fillable in the database.
  protected $fillable = ['case_size', 'dial_colour', 'movement_type', 'case_material'];

  // Define the relationship that a specification belongs to a brand model.
  public function model()
  {
    return $this->belongsTo(BrandModel::class);
  }




}
