<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function index()
    {

      $brands = Brand::select('*')->orderBy('brand')->get();

      return view('brands.index', compact('brands'));
    }

    public function show(Brand $brand)

    {
      return view('brands.show', compact('brand'));
    }

    public function store (Request $request)
    {

      $this->validate($request, [
        'brand' => 'required',
      ]);

      $brand = new Brand;

      $brand->brand = $request->brand;

      $brand->save();

      return back();
    }

public function search(Request $request)
{
  $watchSearched = $request->watchsearch;

  $brand = Brand::where('brand', 'LIKE', "$watchSearched")->get();

  return view('brands.search', compact('brand'));
}

public function delete(Request $request, Brand $brand)
{
  $brand->delete($request->all());

  return redirect('/brands');
}
}
