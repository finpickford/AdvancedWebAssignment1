<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Watch;
use App\Models;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelsController extends Controller

{
  public function store(Request $request, Watch $watch)
  {

      $this->validate($request, [
        'model_name' => 'required',
        'model_number' => 'required',
        'details' => 'required',
        'price' => 'required'
      ]);
      //  $watch->addModel(
        $model = new Models($request->all());

        $watch->addModel($model, 1);
      // );

    return view('watches.show', compact('watch'));
  }

  public function show(Models $model)

  {


    return view('models.show', compact('model'));
  }

  public function edit(Models $model)
  {
    return view('models.edit', compact('model'));
  }

  public function update(Request $request, Models $model)
  {

    $this->validate($request, [
      'model_name' => 'required',
      'model_number' => 'required',
      'details' => 'required',
      'price' => 'required'
    ]);

    $model->update($request->all());

    return back();


  }
}
