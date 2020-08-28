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

Auth::routes();

Route::get('/account', 'AccountController@index');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/user/delete', function() {
//   User::find(1)->delete();
// });

// Route::get('/posts', 'PostController');

// Route::get('/postcomments', 'PostCommentController');
