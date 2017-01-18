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

    public function home()
    {
      return view('welcome');
    }

    public function about()
    {
      return view('about');
    }

    public function dashboard()
    {
      $usersComments = Comments::select(DB::raw("count(user_id) as count"),("users.name as name"))
      ->join('users', 'comments.user_id','=','users.id')
      ->orderBy("users.name")
      ->groupBy("users.name")->get()->toArray();
      $counterUserComments = array_column($usersComments, 'count');
      $labelUserComments = array_column($usersComments, 'name');

      $brands = Models::select(DB::raw("count(watch_id) as count"),("watches.brand as brand"))
      ->join('watches', 'models.watch_id','=','watches.id')
      ->orderBy("watches.brand")
      ->groupBy("watches.brand")->get()->toArray();
      $counter = array_column($brands, 'count');
      $label = array_column($brands, 'brand');

      $userModels = Models::select(DB::raw("count(user_id) as count"),("users.name as name"))
      ->join('users', 'models.user_id','=','users.id')
      ->orderBy("users.name")
      ->groupBy("users.name")->get()->toArray();
      $counterUserModels = array_column($userModels, 'count');
      $labelUserModels = array_column($userModels, 'name');

      return view('dashboard')
      ->with('counterUserComments',json_encode($counterUserComments,JSON_NUMERIC_CHECK))
      ->with('labelUserComments',json_encode($labelUserComments,JSON_NUMERIC_CHECK))
      ->with('counterUserModels',json_encode($counterUserModels,JSON_NUMERIC_CHECK))
      ->with('labelUserModels',json_encode($labelUserModels,JSON_NUMERIC_CHECK))
      ->with('counter',json_encode($counter,JSON_NUMERIC_CHECK))
      ->with('label',json_encode($label,JSON_NUMERIC_CHECK));
    }
}
