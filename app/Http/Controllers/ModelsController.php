<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Watch;
use App\Models;
use App\User;
use App\Specifications;
use App\Comments;
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

        $model = new Models($request->all());

        // $specification = new Specifications(
        //   [
        //     $request->case_size,
        //     $request->dial_colour,
        //     $request->movement_type,
        //     $request->case_material
        //   ]
        // );

        $user = Auth::user()->id;
        $watch->addModel($model, $user);
        //$model->addModel($specification);


    return view('watches.show', compact('watch'));
  }

  public function show(Models $model)

  {
    $comments = Comments::where('models_id', 'LIKE', "$model->id")->get();

    return view('models.show', compact('model', 'comments', 'specifications'));
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

    return view('models.show', compact('model'));
  }

  public function delete(Request $request, Models $model, Watch $watch)
  {

    $model->delete($request->all());

    return view('models.delete', compact('model'));
  }


}
