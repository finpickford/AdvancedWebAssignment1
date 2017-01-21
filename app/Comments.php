<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
protected $fillable = ['comment'];


  public function brandModel()
  {
    return $this->belongsTo(BrandModel::class, 'brand_model_id','id');
  }

    public function user()
    {
      return $this->belongsTo(User::class);
    }


}
