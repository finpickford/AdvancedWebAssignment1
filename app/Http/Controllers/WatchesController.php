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
}
