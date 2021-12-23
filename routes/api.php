<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

//PostController
Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::post('/posts', 'App\Http\Controllers\PostController@store');
Route::get('/posts/{id}', 'App\Http\Controllers\PostController@show');
Route::put('/posts/{id}', 'App\Http\Controllers\PostController@update');
Route::delete('/posts/{id}', 'App\Http\Controllers\PostController@destroy');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


