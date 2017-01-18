<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//

Route::get('dashboard', 'PagesController@dashboard');

  Route::get('/about', 'PagesController@about');

  Route::get('/begin', function () {
  flash('You are now signed in!', 'Success');


    return redirect('/');
  });

  // Route::get('/begin', function () {
  //   Session::flash('status', 'Hello there');
  //
  //   return redirect('/');
  // });

  Route::get('/', 'PagesController@home');

  Route::get('watches', 'WatchesController@index');
  Route::get('watches/{watch}', 'WatchesController@show');
  Route::post('watches/{watch}/models', 'ModelsController@store');
  Route::post('watches/brands', 'WatchesController@store');
  Route::post('watches/{search}', 'WatchesController@search');
  Route::patch('watches/{watch}/delete', 'WatchesController@delete');

  route::get('/watches/{watch}/addmodel' , 'ModelsController@add');

  Route::get('/models/{model}/edit', 'ModelsController@edit');
  Route::patch('/models/{model}/delete', 'ModelsController@delete');
  Route::get('models/{model}', 'ModelsController@show');
  Route::patch('models/{model}' , 'ModelsController@update');
  Route::post('models/{model}/comment' , 'CommentsController@store');

  Route::get('/users/{user}', 'UsersController@show');

  //Route::patch('/users/register', 'UsersController@store');

  Route::get('comments' , 'CommentsController@index');

  Auth::routes();
