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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', 'UserController@index');
    Route::get('/users/{user}', 'UserController@show');
    Route::get('/users/{user}/message', 'MessageController@getMessage');
    Route::get('/users/{user}/room', 'MessageController@getRoomId');
    Route::post('/users/{user}/room', 'MessageController@store');
});

Route::get('/jobs', 'JobController@index');
Route::post('/jobs', 'JobController@store');
Route::get('/jobs/{job}', 'JobController@show');
Route::put('/jobs/{job}', 'JobController@update');
Route::delete('/jobs/{job}', 'JobController@destroy');

// ユーザ登録
Route::post('/signup', 'Auth\RegisterController@register');

// 認証
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');