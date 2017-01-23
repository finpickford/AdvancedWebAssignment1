<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  // Define the relationship so that a brand has many brand models.
  public function brandModels()
  {
    return $this->hasMany(BrandModel::class);
  }

  // Define the relationship so that a brand can add a new model. 
  public function addBrandModel(BrandModel $model, $userId)
  {
    $model->user_id = $userId;

    return $this->models()->save($model);
  }
}
