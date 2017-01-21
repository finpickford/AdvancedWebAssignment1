<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function brandModels()
    {
      return $this->hasMany(BrandModel::class);
    }


    public function addBrandModel(BrandModel $model, $userId)
    {
      $model->user_id = $userId;

      return $this->models()->save($model);
    }
}
