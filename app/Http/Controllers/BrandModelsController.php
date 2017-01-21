<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Brand;
use App\BrandModel;
use App\User;
use App\Specifications;
use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandModelsController extends Controller

{

  public function add(Brand $brand)
  {
    return view('brandmodels.add', compact('brand'));
  }

  public function store(Request $request, Brand $brand)
  {

      $this->validate($request, [
        'model_name' => 'required',
        'model_number' => 'required',
        'details' => 'required',
        'price' => 'required'
      ]);

        // $model = new Models($request->all());

        $user = Auth::user()->id;

        $brandModel = new BrandModel;
        $brandModel->model_name = $request->model_name;
        $brandModel->model_number = $request->model_number;
        $brandModel->details = $request->details;
        $brandModel->price = $request->price;
        $brandModel->user_id = $user;
        $brandModel->brand_id = $brand->id;
        $brandModel->save();

        $specification = new Specifications;
        $specification->case_size = $request->case_size;
        $specification->dial_colour = $request->dial_colour;
        $specification->movement_type = $request->movement_type;
        $specification->case_material = $request->case_material;
        $specification->brand_model_id = $brandModel->id;
        $specification->save();

        // $watch->addModel($model, $user);

    return view('brands.show', compact('brand'));
  }

  public function show(BrandModel $brandModel)

  {
    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();

    return view('brandmodels.show', compact('brandModel', 'comments', 'specifications'));
  }

  public function edit(BrandModel $brandModel)
  {
    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();

    return view('brandmodels.edit', compact('brandModel', 'comments'));
  }

  public function update(Request $request, BrandModel $brandModel)
  {

    $this->validate($request, [
      'model_name' => 'required',
      'model_number' => 'required',
      'details' => 'required',
      'price' => 'required'
    ]);

    $brandModel->update($request->all());
    $brandModel->specifications->update($request->all());

    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();

    return view('brandmodels.show', compact('brandModel', 'comments'));
  }

  public function delete(Request $request, BrandModel $brandModel)
  {

    $brandModel->delete($request->all());

    return view('brandmodels.delete', compact('brandModel'));
  }


}
