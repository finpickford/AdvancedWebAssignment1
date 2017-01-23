<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $fillable = ['comment']; // Make the comment body fillable.

  // Define the relationship so a comment belongs to a certain brand model.
  public function brandModel()
  {
    return $this->belongsTo(BrandModel::class, 'brand_model_id','id');
  }

  // Define the relationship so a comment belongs to a user. 
  public function user()
  {
    return $this->belongsTo(User::class);
  }


}
