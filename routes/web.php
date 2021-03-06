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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::resource('blog','BlogController');
Route::resource('blog_type','BlogTypeController');
Route::resource('list','ListController');
//Route::get('/list/{uid?}/{page?}','ListController@index');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/blog/{blogId?}', 'BlogController@index');
//Route::get('/push', 'BlogController@push');
//Route::post('/add_type', 'BlogTypeController@create');
//Route::post('/add_blog', 'BlogController@create');