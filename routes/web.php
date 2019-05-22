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

Route::get('/', function(){
    return view('product');
});
Route::get('/search', 'PostController@search');
Route::delete('/deleteall','PostController@deleteAll');
Route::get('/post', 'PostController@index')->name('post');
Route::resource('posts','PostController');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/file', 'FileController@index')->name('viewfile');
Route::get('/file/upload', 'FileController@create')->name('formfile');
Route::post('/file/upload', 'FileController@store')->name('uploadfile');
Route::delete('/file/{id}','FileController@destroy')->name('deletefile');
Route::get('/file/download/{id}', 'FileController@show')->name('downloadfile');
Route::get('/file/email/{id}', 'FileController@edit')->name('emailfile');
Route::post('/file/dropzone', 'FileController@dropzone')->name('dropzone');
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('fblogin');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleFacebookCallback')->name('fbcallback');


// Load More
Route::get('/loadmore', 'LoadMoreController@index')->name('viewload');
Route::post('/loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');

// Auto Complete
Route::get('/autocomplete', 'AutocompleteController@index')->name('autocomplete');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

// Dynamic
Route::get('/dynamic_dependent', 'DynamicDependent@index')->name('dynamic');;

Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');