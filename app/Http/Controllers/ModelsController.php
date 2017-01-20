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

  public function add(Watch $watch)
  {
    return view('models.add', compact('watch'));
  }

  public function store(Request $request, Watch $watch)
  {

      $this->validate($request, [
        'model_name' => 'required',
        'model_number' => 'required',
        'details' => 'required',
        'price' => 'required'
      ]);

        // $model = new Models($request->all());

        $user = Auth::user()->id;

        $model = new Models;
        $model->model_name = $request->model_name;
        $model->model_number = $request->model_number;
        $model->details = $request->details;
        $model->price = $request->price;
        $model->user_id = $user;
        $model->watch_id = $watch->id;
        $model->save();

        $specification = new Specifications;
        $specification->case_size = $request->case_size;
        $specification->dial_colour = $request->dial_colour;
        $specification->movement_type = $request->movement_type;
        $specification->case_material = $request->case_material;
        $specification->models_id = $model->id;
        $specification->save();

        // $watch->addModel($model, $user);

    return view('watches.show', compact('watch'));
  }

  public function show(Models $model)

  {
    $comments = Comments::where('models_id', 'LIKE', "$model->id")->get();

    return view('models.show', compact('model', 'comments', 'specifications'));
  }

  public function edit(Models $model)
  {
    $comments = Comments::where('models_id', 'LIKE', "$model->id")->get();

    return view('models.edit', compact('model', 'comments'));
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
    $model->specifications->update($request->all());

    $comments = Comments::where('models_id', 'LIKE', "$model->id")->get();

    return view('models.show', compact('model', 'comments'));
  }

  public function delete(Request $request, Models $model)
  {

    $model->delete($request->all());

    return view('models.delete', compact('model'));
  }


}
