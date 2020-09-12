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
Route::get('/user/delete/{id}', 'UserController@delete');


//ペット一覧
Route::get('/pet', 'PetController@index');

//ペット作成
Route::get('/pet/create', 'PetController@add');
Route::post('/pet/create', 'PetController@create');

//ペット編集
Route::get('/pet/edit', 'PetController@edit');
Route::post('/pet/edit', 'PetController@update');

//ペット削除
Route::get('pet/delete', 'PetController@delete');

Route::get('/home', 'HomeController@index')->name('home');

//middlewareが必要なもののグループ化
//写真投稿一覧
Route::get('/photo', 'PhotoController@index')->middleware('auth');

//写真記事作成
Route::get('/photo/create', 'PhotoController@add');
Route::post('/photo/create', 'PhotoController@create');

//写真詳細
Route::get('/photo/show/{id}', 'PhotoController@show');


//掲示板記事一覧
Route::get('/posts', 'PostController@index');

//掲示板記事作成
Route::get('/posts/create', 'PostController@add');
Route::post('/posts/create', 'PostController@create');

// //掲示板記事詳細
// Route::get('/posts/show/{$id}', 'PostController@show');
