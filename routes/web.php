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
Route::get('/', 'TopController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/user','UserController@index');
  
  Route::get('/user/edit', 'UserController@edit');
  Route::post('/user/update', 'UserController@update');
  
  Route::get('/user/delete/{id}', 'UserController@delete');
});


Route::group(['middleware' => 'auth'], function() {
  Route::get('/pet', 'PetController@index');
  
  Route::get('/pet/create', 'PetController@add');
  Route::post('/pet/create', 'PetController@create');
  
  Route::get('/pet/edit', 'PetController@edit');
  Route::post('/pet/edit', 'PetController@update');
  
  Route::get('/pet/delete', 'PetController@delete');
});

Route::get('/photos/create', 'PhotoController@create')->middleware('auth');

Route::resource('/photos', 'PhotoController', ['only' => ['index', 'show']]);

Route::resource('/photos', 'PhotoController', ['only' => [ 'store', 'edit', 'update', 'destroy']])->middleware('auth');

Route::resource('photocomments', 'PhotoCommentController', ['only' => ['index', 'show']]);

Route::resource('photocomments', 'PhotoCommentController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']])->middleware('auth');;


Route::get('/posts/create', 'PostController@create')->middleware('auth');

Route::resource('posts', 'PostController', ['only' => ['index', 'show']]);

Route::resource('posts', 'PostController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']])->middleware('auth');

Route::resource('postcomments', 'PostCommentController', ['only' => ['index', 'show']]);

Route::resource('postcomments', 'PostCommentController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']])->middleware('auth');

Route::post('/posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('/posts/{post}/unfavorites', 'FavoriteController@destory')->name('unfavorites');