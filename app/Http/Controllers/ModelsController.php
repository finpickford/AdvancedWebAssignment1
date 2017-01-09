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

    $watch->addModel(
        new Models($request->all())
    );

    return view('watches.show', compact('watch'));
  }
}
