<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QueryController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search(Request $request)
  {
     	// Gets the query string from our form submission
      $query = Request::input('search');
      // Returns an array of articles that have the query string located somewhere within
      // our articles titles. Paginates them so we can break up lots of search results.
    	$articles = DB::table('articles')->where('title', 'LIKE', '%' . $query . '%')->paginate(10);

  	// returns a view and passes the view the list of articles and the original query.
      return view('page.search', compact('articles', 'query'));
   }
}
