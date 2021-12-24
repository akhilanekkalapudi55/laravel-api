<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models;

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
Route::delete('/posts/{id}', 'App\Http\Controllers\PostController@delete');

//CategoryController
Route::get('/category', 'App\Http\Controllers\CategoryController@index');
Route::post('/category', 'App\Http\Controllers\CategoryController@store');
Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@show');
Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update');
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@delete');


// ClassificationController
Route::get('/classification', 'App\Http\Controllers\ClassificationController@index');
Route::post('/classification', 'App\Http\Controllers\ClassificationController@store');
Route::get('/classification/{id}', 'App\Http\Controllers\ClassificationController@show');
Route::put('/classification/{id}', 'App\Http\Controllers\ClassificationController@update');
Route::delete('/classifiaction/{id}', 'App\Http\Controllers\ClassificationController@delete');






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


