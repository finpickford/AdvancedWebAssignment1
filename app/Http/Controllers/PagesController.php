<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){



          // $watches  = ['Rolex', 'Omega'];
          // return view('welcome', compact('watches'));
          return view('welcome');
      }
}
