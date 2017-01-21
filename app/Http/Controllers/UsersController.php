<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\BrandModel;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller

{

  public function store(Request $request, User $user)
  {

    $user->addModel(
        new User($request->all())
    );

    return view('/');
  }

  public function show(User $user)

  {

    return view('users.show', compact('user'));
  }

}
