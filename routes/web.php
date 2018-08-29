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
			'as'   => 'dashboard.index',
			'uses' => 'DashboardController@getIndex'
		]);

        Route::get('hall-of-fame/koi-delete/{id}', 'HallController@getKoiDelete');
        Route::post('hall-of-fame/koi-edit/{id}', 'HallController@postKoiEdit');
        Route::get('hall-of-fame/koi-edit/{id}', 'HallController@getKoiEdit');
        Route::post('hall-of-fame/add-koi', 'HallController@postAddKoi');
        Route::get('hall-of-fame/add-koi', 'HallController@getAddKoi');
        Route::get('hall-of-fame/koi-detail/{id}', 'HallController@getKoiDetail');

        Route::get('hall-of-fame/delete/{id}', 'HallController@getDelete');
        Route::post('hall-of-fame/edit/{id}', 'HallController@postEdit');
        Route::get('hall-of-fame/edit/{id}', 'HallController@getEdit');
        Route::get('hall-of-fame/detail/{id}', 'HallController@getDetail');
        Route::post('hall-of-fame/add-contest', 'HallController@postAddContest');
        Route::get('hall-of-fame/add-contest', 'HallController@getAddContest');
        Route::get('hall-of-fame', [
            'as' => 'hall-of-fame.index',
            'uses' => 'HallController@getIndex'
        ]);

//        Route::get('hall-of-fame/drop-koi/{hall_of_fame}/{koi}', [
//            'as' => 'hall-of-fame.drop',
//            'uses' => 'HallOfFameController@dropKoiFromHall'
//        ]);
//        Route::post('hall-of-fame/add-koi', 'HallOfFameController@addKoiToHall');
//        Route::resource('hall-of-fame', 'HallOfFameControl');

        Route::Resource('manage', 'ManageController');
        Route::resource('banner', 'BannerController');
		Route::resource('order', 'OrderController');
		Route::resource('koi', 'KoiController');
		Route::resource('product', 'ProductController');
		Route::resource('store', 'StoreController');
		Route::resource('farm', 'FarmController');
		Route::resource('strain', 'StrainController');
        Route::resource('category', 'CategoryController');
        Route::resource('news', 'NewsController');

        Route::get('event/{event}/koi/{koi}/winner/{user}', [
            'as'   => 'event.koi.winner',
            'uses' => 'EventController@setWinner'
        ]);
        Route::get('event/{event}/koi/{koi}', [
            'as'   => 'event.koi.detail',
            'uses' => 'EventController@showKoiDetail'
        ]);
        Route::resource('event', 'EventController');

        Route::get('user/{user}/order', [
            'as'   => 'user.order',
            'uses' => 'UserController@getOrder'
        ]);
        Route::get('user/{user}/koi', [
            'as'   => 'user.koi',
            'uses' => 'UserController@getKoi'
        ]);
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

        Route::get('logout', [
            'as'   => 'admin.logout',
            'uses' => 'LoginController@logout'
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

	Route::get('/test/user/{user}/koi/{koi}', [
		'uses' => 'KoiController@showKoiDetail'
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
	Route::get('/koi/{koi}', [
		'uses' => 'KoiController@getDetail',
		'as' => 'frontend.koi.detail'
	]);
	
	// Product
	Route::get('/product', [
		'uses' => 'ProductController@getIndex',
		'as' => 'frontend.shop.index'
	]);
	Route::get('/product/category/{category}', [
		'uses' => 'ProductController@getProductCategory',
		'as' => 'frontend.shop.category'
	]);
	Route::get('/product/{product}', [
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
	Route::get('/changeqty/{id}/{qty}', [
		'uses' => 'ProductController@getChangeQty',
		'as' => 'frontend.shop.changeQty'
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
		'as' => 'frontend.event.index'
	]);
	Route::get('/event/{id}', [
		'uses' => 'EventController@getEvent',
		'as' => 'frontend.event.event',
	]);
	Route::get('/event/{event}/{koi}', [
		'uses' => 'EventController@getKoi',
		'as' => 'frontend.event.koi',
	]);
	Route::get('/event/announcement/luckydraw/{event}', [
		'uses' => 'EventController@getluckydraw',
		'as' => 'frontend.event.luckydraw',
		'middleware' => 'auth'		
	]);
	Route::get('/event/announcement/winnerlist/{event}', [
		'uses' => 'EventController@getwinnerlist',
		'as' => 'frontend.event.winnerlist',
		'middleware' => 'auth'		
	]);

	//Booking
	// Route::post('/event/booking/add', [
	// 	'uses' => 'EventController@postEvent',
	// 	'as' => 'frontend.event.bookevent',
	// 	'middleware' => 'auth'		
	// ]);
	Route::get('/event/booking/add/{koi}/{event}', [
			'uses' => 'EventController@getEventAdd',
			'as' => 'frontend.event.bookevent',
			'middleware' => 'auth'		
		]);

	Route::get('/event/booking/del/{koi}/{event}', [
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
	// Route::post('/favorite/add', [
	// 	'uses' => 'UserController@postfavorite',
	// 	'as' => 'frontend.user.favorite-add',
	// 	'middleware' => 'auth'		
	// ]);
	Route::get('/favorite/add/{id}', [
		'uses' => 'UserController@postfavorite',
		'as' => 'frontend.user.favorite-add',
		'middleware' => 'auth'		
	]);
	Route::get('/favorite/del/{id}/{type}', [
		'uses' => 'UserController@getfavoriteDel',
		'as' => 'frontend.user.favorite-del',
		'middleware' => 'auth'		
	]);

	//User
	Route::get('/myport', [
		'uses' => 'UserController@getMyports',
		'as' => 'frontend.user.myport',
		'middleware' => 'auth'		
	]);
	Route::get('/myport/koi/{id}', [
		'uses' => 'UserController@getMyportKoi',
		'as' => 'frontend.user.myport-koi',
		'middleware' => 'auth'		
	]);
	Route::get('/myorder', [
		'uses' => 'UserController@getMyorders',
		'as' => 'frontend.user.myorder',
		'middleware' => 'auth'		
	]);
	Route::get('/favorite', [
		'uses' => 'UserController@getFavorite',
		'as' => 'frontend.user.favorite',
		'middleware' => 'auth'		
	]);

	//Payment
	Route::get('/payment', [
		'uses' => 'PaymentController@getIndex',
		'as' => 'frontend.payment.index'	
	]);
	Route::get('/payment/order/{id}', [
		'uses' => 'PaymentController@getPayment',
		'as' => 'frontend.payment.payment',
		'middleware' => 'auth'		
	]);
	Route::post('/payment/order/{id}', [
		'uses' => 'PaymentController@postPayment',
		'as' => 'frontend.payment.payment',
		'middleware' => 'auth'		
	]);
	Route::get('/payment/success/{id}', [
		'uses' => 'PaymentController@getSuccess',
		'as' => 'frontend.payment.success',
		'middleware' => 'auth'	
	]);

	//News
	Route::get('/news', [
		'uses' => 'NewsController@getIndex',
		'as' => 'frontend.news.index',
	]);

	Route::get('/news/{news}', [
		'uses' => 'NewsController@getNews',
		'as' => 'frontend.news.news',
	]);

//	//Hall of fame
//	Route::get('hall-of-fame', [
//		'uses' => 'HallOfFameController@getIndex',
//		'as' => 'frontend.hall-of-fame.index',
//	]);
//	Route::get('hall-of-fame/{id}', [
//		'uses' => 'HallOfFameController@getHallOfFame',
//		'as' => 'frontend.hall-of-fame.hall-of-fame',
//	]);

	Route::get('hall-of-fame/detail/{id}', 'HallController@getDetail');
	
    Route::get('hall-of-fame', [
		'uses' => 'HallController@getIndex',
		'as' => 'frontend.hall-of-fame.index',
	]);

	Route::get('test', [
		'uses' => 'KoiController@showKoiDetail',
		// 'as' => 'frontend.hall-of-fame.index',
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

Route::get('/about', [
	'uses' => 'HomeController@getAboutUs',
	'as'   => 'frontend.about.index'
]);

Route::get('/contact', [
	'uses' => 'HomeController@getContactUs',
	'as'   => 'frontend.contact.index'
]);

Route::post('/contact', [
	'uses' => 'HomeController@postContactUs',
	'as'   => 'frontend.contact.postContact'
]);

Route::get('/contact/line', [
	'uses' => 'HomeController@getLineContact',
	'as'   => 'frontend.contact.line'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
