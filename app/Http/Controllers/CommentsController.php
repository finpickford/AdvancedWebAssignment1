<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Brand;
use App\BrandModel;
use App\User;
use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller

{

  // Create a function to store a new comment for the brand model.
  public function store(Request $request, BrandModel $brandModel)
  {

    // Validation
    $this->validate($request, [
      'comment' => 'required',
    ]);

    // Create a new instance of the comments model.
    $comment = new Comments;
    $comment->comment = $request->comment; // Request the comment body.
    $user = Auth::user()->id; // Get the logged in user.
    $comment->user_id = $user; // Set the user id as logged in user.
    $comment->brand_model_id = $brandModel->id; // Set the id of the brand model as the current brand variable.

    $comment->save();

    $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get(); // Get the comments again for that model to update the page.

    return back();
  }

  // Function to delete a comment. 
  public function delete(Request $request, Comments $comment)
  {

    // Request the fields from the page and delete them.
    $comment->delete($request->all());

    return back();
  }
}
