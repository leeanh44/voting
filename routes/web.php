<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('user', 'Admin\UserController');
});
	
Route::get('home', array('as' => 'home', 'uses' => function(){
  return view('home');
}));
Route::get('/redirect', 'SocialAuthController@redirectFacebook');
Route::get('/callback', 'SocialAuthController@callbackFacebook');

Route::get('/callback/{provider}', 'SocialAuthController@callbackTwitter');
Route::get('/redirect/{provider}', 'SocialAuthController@redirectTwitter');