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

Route::get('/', 'PostsController@index')->name('top');

Route::group(['middleware' => 'auth'], function() {
        Route::get ('posts/create', 'PostsController@create');
        Route::post('posts/create', 'PostsController@store');
        Route::get ('/posts/show/{id}', 'PostsController@show');
    });
Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'posts/{id}'], function() {
        Route::post('like', 'LikeController@store')->name('likes.like');
        Route::delete('unlike', 'LikeController@destroy')->name('likes.unlike');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
