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

// Pages routes, used to display defualt pages not related to a particular controller.
Route::get('dashboard', 'PagesController@dashboard'); // Load the sites dashboard page.
Route::get('/about', 'PagesController@about'); // Load the about page.
Route::get('/begin', function () { // load a begin flash message.
  flash('You are now signed in!', 'Success');
    return redirect('/');
});

Route::get('/', 'PagesController@home');

// Watches routes, used to display any page relating to the watch brand and deal with any request to do with the brand.
Route::get('brands', 'BrandsController@index'); // Load the index page of the watch brands.
Route::get('brand/{brand}', 'BrandsController@show'); // Load a particular watch brands information.
Route::post('brand/{brand}/brandModels', 'BrandModelsController@store'); //Store a new model to a stated watch brand.
Route::post('brand/brands', 'BrandsController@store'); // Store a new watch brand.
Route::post('brand/{search}', 'BrandsController@search'); // Search for a watch brand.
Route::post('brand/{brand}/delete', 'BrandsController@delete'); // Delete a watch brand.
route::get('/brand/{brand}/addmodel' , 'BrandModelsController@add'); // Show the add model view, go to the models controller not watch controller.

// Models routes, used to display any page relating to a watch model and deal with any requests with a model.
Route::get('/brandModels/{brandModel}/edit', 'BrandModelsController@edit'); // Show an edit view for a user to edit a model.
Route::post('/brandModels/{brandModel}/delete', 'BrandModelsController@delete'); // Delete a model.
Route::get('brandModels/{brandModel}', 'BrandModelsController@show'); // Show a models info.
Route::patch('brandModels/{brandModel}/update' , 'BrandModelsController@update'); // Update a model thats already in the database. Use a patch route to patch to database.
Route::post('brandModels/{brandModel}/comment' , 'CommentsController@store'); // Add a comment to the models page.

// User routes, used to display and handle any requests releating to a user.
Route::get('/users/{user}', 'UsersController@show'); // Show a user profile.

Route::post('/{comment}/delete', 'CommentsController@delete');

Auth::routes();
