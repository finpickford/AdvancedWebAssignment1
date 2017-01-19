<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Watch;
use App\Models;
use App\User;
use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller

{

  public function store(Request $request, Models $model)
  {

      $this->validate($request, [
        'comment' => 'required',
      ]);

        $comment = new Comments;
        $comment->comment = $request->comment;
        $user = Auth::user()->id;
        $comment->user_id = $user;
        $comment->models_id = $model->id;

        $comment->save();

        $comments = Comments::where('models_id', 'LIKE', "$model->id")->get();


    return view('models.show', compact('model', 'comments'));
  }

}
