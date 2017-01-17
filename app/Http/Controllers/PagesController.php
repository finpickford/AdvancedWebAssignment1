<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Watch;
use App\Models;
use App\User;
use App\Specifications;
use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function home(){
          return view('welcome');
      }

    public function about(){
          return view('about');
      }

      public function chartjs()

{

    $rolex = Models::select(DB::raw("count(*) as count", "watch_id"))

        ->orderBy("created_at")

        ->groupBy(DB::raw("(created_at)"))

        ->where('watch_id', '=', 10)

        ->get()->toArray();

    $rolex = array_column($rolex, 'count');



    $omega = Models::select(DB::raw("count(*) as count", "watch_id"))

        ->orderBy("created_at")

        ->groupBy(DB::raw("(created_at)"))

        ->where('watch_id', '=', 2)

        ->get()->toArray();

    $omega = array_column($omega, 'count');



    return view('chartjs')

            ->with('rolex',json_encode($rolex,JSON_NUMERIC_CHECK))

            ->with('omega',json_encode($omega,JSON_NUMERIC_CHECK));

}

}
