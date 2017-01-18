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

  // $brands = Models::select(DB::raw("count(*) as count", "watch_id"))
  //
  //     ->orderBy("watch_id")
  //
  //     ->groupBy(DB::raw("(watch_id)"))
  //
  //     ->get()->toArray();
  //
  // $brands = array_column($brands, 'count');

  // $users = Comments::select(DB::raw("count(*) as count", "user_id"))
  //
  //     ->orderBy("user_id")
  //
  //     ->groupBy(DB::raw("(user_id)"))
  //
  //     ->get()->toArray();
  //
  // $users = array_column($users, 'count');

  $brands = Models::select(DB::raw("count(*) as count", "watch_id"))
  ->join('watches', 'models.watch_id','=','watches.id')
  ->orderBy("watches.brand")
  ->groupBy("watches.brand")
  ->get()->toArray();

  $brands = array_column($brands, 'count');

    return view('chartjs')


            ->with('brands',json_encode($brands,JSON_NUMERIC_CHECK));
            // ->with('users',json_encode($users,JSON_NUMERIC_CHECK));

}

}
