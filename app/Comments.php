<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
protected $fillable = ['comment'];

    public function models()
    {
      return $this->belongsTo(Models::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }


}
