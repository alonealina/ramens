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

Route::get('/', 'PostsController@index');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);
        Route::group(['prefix' => 'ramens/{id}'], function(){

  });
});

Route::get('posts/buzz/{id}', 'PostsController@buzz')->name('posts.buzz');

// ラーメン機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('ramens', 'RamensController', ['only' => ['index', 'show']]);
});

