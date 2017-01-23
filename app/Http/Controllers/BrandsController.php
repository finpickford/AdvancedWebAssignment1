<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
  // Create a function to show every brand on a page, as an index.
  public function index()
  {

    // Select everything from the brand table and order it alphabetically.
    $brands = Brand::select('*')->orderBy('brand')->get();

    return view('brands.index', compact('brands'));
  }

  // Create a function to show the brand's info page.
  public function show(Brand $brand)

  {
    return view('brands.show', compact('brand'));
  }

  // Create a function to store a new brand.
  public function store (Request $request)
  {

    // Validation.
    $this->validate($request, [
      'brand' => 'required',
    ]);

    // Create a new brand model instance.
    $brand = new Brand;

    // Request the brand name from the view.
    $brand->brand = $request->brand;

    $brand->save();

    return back();
  }

  // A function to search for a brand.
  public function search(Request $request)
  {
    // Validation.
    $this->validate($request, ['watchsearch'=>'required']);

    // Request the searched field from the view.
    $watchSearched = $request->watchsearch;

    // Search the brand table for the watchSearched variable.
    $brand = Brand::where('brand', 'LIKE', "$watchSearched")->get();

    return view('brands.search', compact('brand'));
  }

  // Function to delete a brand.
  public function delete(Request $request, Brand $brand)
  {
    // Request the fields from the page and delete them. 
    $brand->delete($request->all());

    return redirect('/brands');
  }
}
