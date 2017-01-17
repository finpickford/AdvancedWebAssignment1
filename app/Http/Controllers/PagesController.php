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


        $omega = Models::select(DB::raw("count(*) as count", "watch_id"))

            ->orderBy("watch_id")

            ->groupBy(DB::raw("(watch_id)"))

            ->where('watch_id', '=', 2)

            ->get()->toArray();

        $omega = array_column($omega, 'count');

          $rolex = Models::select(DB::raw("count(*) as count", "watch_id"))

              ->orderBy("watch_id")

              ->groupBy(DB::raw("(watch_id)"))

              ->where('watch_id', '=', 10)

              ->get()->toArray();

          $rolex = array_column($rolex, 'count');




          return view('welcome')

                  ->with('omega',json_encode($omega,JSON_NUMERIC_CHECK))
                  ->with('rolex',json_encode($rolex,JSON_NUMERIC_CHECK));

      }

  

    public function about(){
          return view('about');
      }

      public function chartjs()

{

  $omega = Models::select(DB::raw("count(*) as count", "watch_id"))

      ->orderBy("watch_id")

      ->groupBy(DB::raw("(watch_id)"))

      ->where('watch_id', '=', 2)

      ->get()->toArray();

  $omega = array_column($omega, 'count');

    $rolex = Models::select(DB::raw("count(*) as count", "watch_id"))

        ->orderBy("watch_id")

        ->groupBy(DB::raw("(watch_id)"))

        ->where('watch_id', '=', 10)

        ->get()->toArray();

    $rolex = array_column($rolex, 'count');




    return view('welcome')

            ->with('omega',json_encode($omega,JSON_NUMERIC_CHECK))
            ->with('rolex',json_encode($rolex,JSON_NUMERIC_CHECK));

}

}
