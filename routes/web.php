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

//アカウント画面表示
Route::get('/user', 'UserController@index');

//アカウント編集
Route::get('/user/edit', 'UserController@edit');
Route::post('/user/update', 'UserController@update');

//アカウント削除
Route::get('/user/delete', 'UserController@delete');


//ペット一覧
Route::get('/pet', 'PetController@index');

//ペット作成
Route::get('pet/create', 'PetController@add');
Route::post('pet/create', 'PetController@create');

//ペット編集
Route::get('pet/edit', 'PetController@edit');
Route::post('pet/edit', 'PetController@update');

//ペット削除
Route::get('pet/delete', 'PetController@delete');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/posts', 'PostController@index');

// Route::get('/postcomments', 'PostCommentController');
