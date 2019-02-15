<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('posts/{id}', 'UplexisController@delete');
Route::get('posts/all', 'UplexisController@all');
Route::get('posts/uplexis', 'UplexisController@uplexisPosts');
Route::post('posts/save', 'UplexisController@saveDataPosts');