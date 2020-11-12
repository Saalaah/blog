<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:api')->get('/hi/{id}','PostsController@hi');

//posts routes
Route::middleware('auth:api')->get('/all','PostController@index');
Route::middleware('auth:api')->get('/post/{id}','PostController@show');
Route::middleware('auth:api')->post('/addPost','PostController@store');
Route::middleware('auth:api')->post('/editPost/{id}','PostController@update');
Route::middleware('auth:api')->get('/deletePost/{id}','PostController@destroy');
Route::middleware('auth:api')->get('/userPosts/{id}','PostController@userPosts');

//Comments routes
Route::middleware('auth:api')->post('/addComment','CommentController@store');
Route::middleware('auth:api')->post('/editComment/{id}','CommentController@update');
Route::middleware('auth:api')->get('/deleteComment/{id}','CommentController@destroy');
Route::middleware('auth:api')->get('/postComment/{id}','CommentController@show');

//User routes
Route::post('/createUser','api\SignupController@create');
Route::post('/login','api\SigninController@login');


