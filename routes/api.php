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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//used APIs

Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/projects/data/{id}', 'App\Http\Controllers\ProjectController@showProject');
Route::get('/userandproject/data/{id}', 'App\Http\Controllers\UserAndProjectController@showUserData2');









Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::get('/projects/{id}', 'App\Http\Controllers\ProjectController@show');


Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');


Route::get('/userandproject', 'App\Http\Controllers\UserAndProjectController@index');
Route::get('/userandproject/{id}', 'App\Http\Controllers\UserAndProjectController@show');
Route::get('/userandproject/user/{id}', 'App\Http\Controllers\UserAndProjectController@showByUserId');
Route::get('/userandproject/project/{id}', 'App\Http\Controllers\UserAndProjectController@showByProjectId');

Route::get('/userandproject/data2/{id}', 'App\Http\Controllers\UserAndProjectController@showUserData');

Route::get('/task', 'App\Http\Controllers\TaskController@index');
Route::get('/task/{id}', 'App\Http\Controllers\TaskController@show');
Route::get('/task/user/{id}', 'App\Http\Controllers\TaskController@showByUserId');
Route::get('/task/project/{id}', 'App\Http\Controllers\TaskController@showByProjectId');

Route::get('/task/project/a/{id}', 'App\Http\Controllers\TaskController@showProject');
