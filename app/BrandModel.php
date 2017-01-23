<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
  // Make the following fillable in the database.
  protected $fillable = ['model_name', 'model_number', 'details', 'price'];

  // Define the relationship so a brand model belongs to a brand.
  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }

  // Define the relationship so that a brand model belongs to a user.
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Define the relationship so a brand model has many comments.
  public function comments()
  {
    return $this->hasMany(Comments::class);
  }

  // Define the relationship so that a brand model has one specification.
  public function specifications()
  {
    return $this->hasOne(Specifications::class);
  }
}
