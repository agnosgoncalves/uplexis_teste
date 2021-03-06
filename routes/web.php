<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
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

Route::get('/', function () {
  if(Auth::check()){
    return view('home');
  } else {
    return redirect()->route('login');
  }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/capturar-artigos', 'GetPostsController@index')->name('get-posts');
Route::get('/artigos', 'PostsController@index')->name('posts');
