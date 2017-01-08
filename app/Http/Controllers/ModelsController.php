<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Watch;
use App\Models;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelsController extends Controller

{
  public function store(Request $request, Watch $watch)
  {
    $model = new Models;

    $model->model_name = $request->model_name;
    $model->model_number = $request->model_number;
    $model->details = $request->details;
    $model->price = $request->price;

    $watch->models()->save($model);

    return back();
  }
}
