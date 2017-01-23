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

  // Function to load the home view.
  public function home()
  {
    return view('welcome');
  }

  // Function to load the about page.
  public function about()
  {
    return view('about');
  }

  // Function to load the dashboard, as well as send data through to be used in a javascript chart.
  public function dashboard()
  {
    // A query to select all user id's from the comments table.
    // Join the users table and then output the users name, instead of their id.
    // Group the usernames which are the same.
    // Output the count as a count array.
    // Output the names as a label array.
    $usersComments = Comments::select(DB::raw("count(user_id) as count"),("users.name as name"))
    ->join('users', 'comments.user_id','=','users.id')
    ->orderBy("users.name")
    ->groupBy("users.name")->get()->toArray();
    $counterUserComments = array_column($usersComments, 'count');
    $labelUserComments = array_column($usersComments, 'name');

    // A query to select all brand id's from the brand model table.
    // Join the brands table and output the brands name instead of thier id.
    // Group the brands which are the same.
    // Output the count as an array.
    // Output the brand names as an array for use with the labels of the chart.
    $brands = BrandModel::select(DB::raw("count(brand_id) as count"),("brands.brand as brand"))
    ->join('brands', 'brand_models.brand_id','=','brands.id')
    ->orderBy("brands.brand")
    ->groupBy("brands.brand")->get()->toArray();
    $counterBrands = array_column($brands, 'count');
    $labelBrands = array_column($brands, 'brand');

    // A query to select all user id's from the brand model table.
    // Join the users table and output the user name instead of thier id.
    // Group the users which are the same.
    // Output the count as an array.
    // Output the user names as an array for use with the labels of the chart.
    $userModels = BrandModel::select(DB::raw("count(user_id) as count"),("users.name as name"))
    ->join('users', 'brand_models.user_id','=','users.id')
    ->orderBy("users.name")
    ->groupBy("users.name")->get()->toArray();
    $counterUserModels = array_column($userModels, 'count');
    $labelUserModels = array_column($userModels, 'name');

    // Return the dashboard view with each variable as JSON data.
    return view('dashboard')
    ->with('counterUserComments',json_encode($counterUserComments,JSON_NUMERIC_CHECK))
    ->with('labelUserComments',json_encode($labelUserComments,JSON_NUMERIC_CHECK))
    ->with('counterUserModels',json_encode($counterUserModels,JSON_NUMERIC_CHECK))
    ->with('labelUserModels',json_encode($labelUserModels,JSON_NUMERIC_CHECK))
    ->with('counterBrands',json_encode($counterBrands,JSON_NUMERIC_CHECK))
    ->with('labelBrands',json_encode($labelBrands,JSON_NUMERIC_CHECK));
  }
}
