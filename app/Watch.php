<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    public function models()
    {
      return $this->hasMany(Models::class);
    }

    // public function brands()
    // {
    //   return $this->hasMany(Watch::class);
    // }

    public function addModel(Models $model, $userId)
    {
      $model->user_id = $userId;

      return $this->models()->save($model);
    }
}
