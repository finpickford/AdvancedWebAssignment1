<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
  public function store() {

    return $request()->all();

  }
}
