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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'JwtController@register');
Route::post('login', 'JwtController@login');
Route::get('test', 'TestController@test');

Route::get('testall', 'TestController@testAuth')->middleware('jwt.verify');
Route::get('user', 'JwtController@getAuthenticatedUser')->middleware('jwt.verify');


Route::get('chat', 'Api\ChatTestController@chat');
Route::post('postAPI', 'Api\PostTestController@postAPI');




