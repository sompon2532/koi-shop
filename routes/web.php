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
	Route::middleware('auth:admin')->namespace('Backoffice')->group(function() {
		Route::get('/', [
			'as'   => 'admin.index',
			'uses' => 'AdminController@getIndex'
		]);

		Route::resource('koi', 'KoiController');
		Route::resource('product', 'ProductController');
		Route::resource('farm', 'FarmController');
		Route::resource('strain', 'StrainController');
        Route::resource('category', 'CategoryController');
        Route::resource('news', 'NewsController');

        Route::get('event/{event}/koi/{koi}/set/{user}', [
            'as'   => 'event.koi.owner',
            'uses' => 'EventController@setOwner'
        ]);
        Route::get('event/{event}/koi/{koi}', [
            'as'   => 'event.koi.detail',
            'uses' => 'EventController@showKoiDetail'
        ]);
        Route::resource('event', 'EventController');

        Route::resource('user', 'UserController');
	});

	Route::group(['namespace' => 'Admin'], function() {
		Route::get('login', [
			'as'   => 'admin.login',
			'uses' => 'LoginController@showLoginForm'
		]);

		Route::post('login', [
			'uses' => 'LoginController@login'
		]);

		Route::get('register', [
			'as'   => 'admin.register',
			'uses' => 'RegisterController@showRegistrationForm'
		]);

		Route::post('register', [
			'uses' => 'RegisterController@register'
		]);
	});
});

Route::group(['namespace' => 'Frontend'], function() {
	
	Route::get('change/{lacale}', 'LanguageController@setlocale');

	Route::get('/test/{id}', [
		'uses' => 'ProductController@getItem'
	]);

	// Koi
	Route::get('/koi', [
		'uses' => 'KoiController@getIndex',
		'as' => 'frontend.koi.index'
	]);

	Route::get('/koi/category/{category}', [
		'uses' => 'KoiController@getKoiCategory',
		'as' => 'frontend.koi.category'
	]);

	Route::get('/koi/{id}', [
		'uses' => 'KoiController@getDetail',
		'as' => 'frontend.koi.detail'
	]);
	
	// Product
	Route::get('/koi-product', [
		'uses' => 'ProductController@getIndex',
		'as' => 'frontend.shop.index'
	]);
	
	Route::get('/koi-product/category/{category}', [
		'uses' => 'ProductController@getProductCategory',
		'as' => 'frontend.shop.category'
	]);

	Route::get('/koi-product/{id}', [
		'uses' => 'ProductController@getDetail',
		'as' => 'frontend.shop.detail'
	]);

	// Shop
	Route::get('/add-to-cart/{id}', [
		'uses' => 'ProductController@getAddToCart',
		'as' => 'frontend.shop.addToCart'
	]);

	Route::get('/reduce/{id}', [
		'uses' => 'ProductController@getReduceByOne',
		'as' => 'frontend.shop.reduceByone'
	]);

	Route::get('/reduce-add/{id}', [
		'uses' => 'ProductController@getReduceAddByOne',
		'as' => 'frontend.shop.reduceAddByone'
	]);

	Route::get('/remove/{id}', [
		'uses' => 'ProductController@getRemoveItem',
		'as' => 'frontend.shop.remove'
	]);

	Route::get('/shopping-cart', [
		'uses' => 'ProductController@getCart',
		'as' => 'frontend.shop.shoppingCart'
	]);
	
	Route::get('/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);
	
	Route::post('/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'		
	]);

	// Events
	Route::get('/event', [
		'uses' => 'EventController@getIndex',
		'as' => 'frontend.event.index',
		'middleware' => 'auth'
	]);

	Route::get('/event/{id}', [
		'uses' => 'EventController@getEvent',
		'as' => 'frontend.event.event',
		'middleware' => 'auth'
	]);

	Route::get('/event/{event}/{koi}', [
		'uses' => 'EventController@getKoi',
		'as' => 'frontend.event.koi',
		'middleware' => 'auth'
	]);
	
	//Booking
	Route::post('/event/booking/add', [ //add_koi_user
		'uses' => 'EventController@postEvent',
		'as' => 'frontend.event.bookevent',
		'middleware' => 'auth'		
	]);

	Route::get('/event/booking/del/{koi}/{event}', [ //delete_koi_user
		'uses' => 'EventController@getEventDel',
		'as' => 'frontend.event.bookdel',
		'middleware' => 'auth'		
	]);

	Route::get('/mybooking', [
		'uses' => 'EventController@getMyBooking',
		'as' => 'frontend.event.booking',
		'middleware' => 'auth'		
	]);

	//Favorite
	Route::post('/event/favorite/add', [ //add_koi_user
		'uses' => 'UserController@postfavorite',
		'as' => 'frontend.user.favorite',
		'middleware' => 'auth'		
	]);

	Route::get('/event/favorite/del/{item}/{type}', [ //add_koi_user
		'uses' => 'UserController@getfavoriteDel',
		'as' => 'frontend.user.favoritedel',
		'middleware' => 'auth'		
	]);
});

Route::get('/', [
	'uses' => 'HomeController@Index',
	'as' => 'frontend.index'
]);

Route::get('login', [
	'as'   => 'auth.login',
	'uses' => 'LoginController@showLoginForm',
	'middleware' => 'auth'
]);

Route::get('register', [
	'as'   => 'auth.register',
	'uses' => 'RegisterController@showRegistrationForm'
]);

// Route::get('/', function () {
// 	return view('frontend.index');
// });

Route::get('/about', function () {
	return view('frontend.about.index');
});

Route::get('/contact', function () {
	return view('frontend.contact.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
