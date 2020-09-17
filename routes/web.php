<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/','WelcomeController');

Auth::routes();
// Route::get('/welcome', 'WelcomeController@index')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome/label/{id}', 'welcomeController@label');

Route::get('/post', 'PostController@post');
Route::get('/post/detail/{id}', 'PostController@detail');
Route::put('/post/update/{id}', 'PostController@update');
Route::get('/post/hapus/{id}', 'PostController@delete');
Route::post('/post/store', 'PostController@store');

Route::get('/mypost', 'WelcomeController@mypost');
Route::get('/upload', 'UploadController@upload');
Route::get('/edit/{id}', 'PostController@edit');
Route::any('/rating/store', 'RatingController@store');

Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

Route::get('/text', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

// Route::post('/upload/proses', 'UploadController@proses_upload');