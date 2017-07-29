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


Route::group(['prefix' => 'admin'], function() {
	Route::namespace('Backoffice')->group(function() {
		Route::get('/', [
			'as'   => 'get::admin.index',
			'uses' => 'AdminController@getIndex'
		]);
	});
	
	Route::namespace('Admin')->group(function() {
		Route::get('login', [
			'as' => 'get::admin.login',
			'uses' => 'LoginController@showLoginForm'
		]);

		Route::post('login', [
			'as' => 'post::admin.login',
			'uses' => 'LoginController@login'
		]);

		Route::get('register', [
			'as' => 'get::admin.register',
			'uses' => 'RegisterController@showRegistrationForm'
		]);

		Route::post('register', [
			'as' => 'post::admin.register',
			'uses' => 'RegisterController@register'
		]);
	});
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
