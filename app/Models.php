<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
  protected $fillable = ['model_name', 'model_number', 'details', 'price'];

    public function watch()
    {
      return $this->belongsTo(Watch::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function comments()
    {
      return $this->hasMany(Comments::class);
    }


}
