<?php

namespace App\Http\Controllers;

use App\Watch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WatchesController extends Controller
{
    public function index()
    {

      $watches = Watch::all();

      return view('watches.index', compact('watches'));
    }

    public function show(Watch $watch)

    {
      return view('watches.show', compact('watch'));
    }

    public function store (Request $request)
    {

      $this->validate($request, [
        'brand' => 'required',
      ]);

      $watch = new Watch;

      $watch->brand = $request->brand;

      $watch->save();

      return back();
    }

public function search(Request $request)
{
  $watchSearched = $request->watchsearch;

  $watch = Watch::where('brand', 'LIKE', "$watchSearched")->get();

  return view('watches.search', compact('watch'));
}

public function delete(Request $request, Watch $watch)
{
  $watch->delete($request->all());


  return redirect('/watches');
}
}
