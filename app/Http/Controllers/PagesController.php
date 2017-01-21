<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Brand;
use App\BrandModel;
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

      $brands = BrandModel::select(DB::raw("count(brand_id) as count"),("brands.brand as brand"))
      ->join('brands', 'brand_models.brand_id','=','brands.id')
      ->orderBy("brands.brand")
      ->groupBy("brands.brand")->get()->toArray();
      $counterBrands = array_column($brands, 'count');
      $labelBrands = array_column($brands, 'brand');

      $userModels = BrandModel::select(DB::raw("count(user_id) as count"),("users.name as name"))
      ->join('users', 'brand_models.user_id','=','users.id')
      ->orderBy("users.name")
      ->groupBy("users.name")->get()->toArray();
      $counterUserModels = array_column($userModels, 'count');
      $labelUserModels = array_column($userModels, 'name');

      return view('dashboard')
      ->with('counterUserComments',json_encode($counterUserComments,JSON_NUMERIC_CHECK))
      ->with('labelUserComments',json_encode($labelUserComments,JSON_NUMERIC_CHECK))
      ->with('counterUserModels',json_encode($counterUserModels,JSON_NUMERIC_CHECK))
      ->with('labelUserModels',json_encode($labelUserModels,JSON_NUMERIC_CHECK))
      ->with('counterBrands',json_encode($counterBrands,JSON_NUMERIC_CHECK))
      ->with('labelBrands',json_encode($labelBrands,JSON_NUMERIC_CHECK));
    }
}
