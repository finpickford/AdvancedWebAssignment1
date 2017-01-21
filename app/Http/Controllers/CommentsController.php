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

  public function store(Request $request, BrandModel $brandModel)
  {

      $this->validate($request, [
        'comment' => 'required',
      ]);

        $comment = new Comments;
        $comment->comment = $request->comment;
        $user = Auth::user()->id;
        $comment->user_id = $user;
        $comment->brand_model_id = $brandModel->id;

        $comment->save();

        $comments = Comments::where('brand_model_id', 'LIKE', "$brandModel->id")->get();


    return view('brandmodels.show', compact('brandModel', 'comments'));
  }

}
