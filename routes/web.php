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

  Route::get('/about', 'PagesController@about');
  Route::get('/', 'PagesController@home');

  Route::get('forum', 'ForumController@index');

  Route::get('watches', 'WatchesController@index');
  Route::get('watches/{watch}', 'WatchesController@show');
  Route::post('watches/{watch}/models', 'ModelsController@store');
  Route::post('watches/brands', 'WatchesController@store');
  Route::post('watches/{search}', 'WatchesController@search');
  Route::patch('watches/{watch}/delete', 'WatchesController@delete');


  Route::get('/models/{model}/edit', 'ModelsController@edit');
  Route::patch('/models/{model}/delete', 'ModelsController@delete');
  Route::get('models/{model}', 'ModelsController@show');
  Route::patch('models/{model}' , 'ModelsController@update');

  Route::get('/users/{user}', 'UsersController@show');

  Route::patch('/users/register', 'UsersController@store');

  Auth::routes();
