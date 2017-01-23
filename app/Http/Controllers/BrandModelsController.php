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

  // Function to add a new brand model. Find the brand object and load a new view with that variable.
  public function add(Brand $brand)
  {
    return view('brandmodels.add', compact('brand'));
  }

  // Function to store the brand model in the database.
  public function store(Request $request, Brand $brand)
  {

    // Validation.
    $this->validate($request, [
      'model_name' => 'required',
      'model_number' => 'required',
      'details' => 'required',
      'price' => 'required',
      'case_size' => 'required',
      'dial_colour' => 'required',
      'movement_type' => 'required',
      'case_material' => 'required'
    ]);

    // Get the logged in user.
    $user = Auth::user()->id;

    // Create a new BrandModel model instance. Populate it with the request fields from the view.
    $brandModel = new BrandModel;
    $brandModel->model_name = $request->model_name;
    $brandModel->model_number = $request->model_number;
    $brandModel->details = $request->details;
    $brandModel->price = $request->price;
    $brandModel->user_id = $user;
    $brandModel->brand_id = $brand->id;
    $brandModel->save();

    // Create a new Specifications model instance. Populate it with the request fields from the view.
    $specification = new Specifications;
    $specification->case_size = $request->case_size;
    $specification->dial_colour = $request->dial_colour;
    $specification->movement_type = $request->movement_type;
    $specification->case_material = $request->case_material;
    $specification->brand_model_id = $brandModel->id;
    $specification->save();

    return view('brands.show', compact('brand'));
  }

  // Function for showing each model's info.
  public function show(BrandModel $brandModel)
  {
    // Search for the comments where the brand model id is the same as the variable passed through.
    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();

    return view('brandmodels.show', compact('brandModel', 'comments', 'specifications'));
  }

  // Function for editing a model.
  public function edit(BrandModel $brandModel)
  {
    // Pass through the comments for this brand model.
    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();

    return view('brandmodels.edit', compact('brandModel', 'comments'));
  }

  // Function to update the database for the model.
  public function update(Request $request, BrandModel $brandModel)
  {
    // Validation.
    $this->validate($request, [
      'model_name' => 'required',
      'model_number' => 'required',
      'details' => 'required',
      'price' => 'required',
      'case_size' => 'required',
      'dial_colour' => 'required',
      'movement_type' => 'required',
      'case_material' => 'required'
    ]);

    // Update the brand model and specifactions table with the requests.
    $brandModel->update($request->all());
    $brandModel->specifications->update($request->all());

    // Get the comments for the model.
    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();

    return view('brandmodels.show', compact('brandModel', 'comments'));
  }

  // Function to delete the brand model.
  public function delete(Request $request, BrandModel $brandModel)
  {

    // Delete the requested model name from the table. 
    $brandModel->delete($request->all());

    return view('brandmodels.delete', compact('brandModel'));
  }


}
