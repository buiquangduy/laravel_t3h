<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=>'WelcomeController@index']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('auth/login',['as' => 'login','uses'=>'Auth\AuthController@getLogin']);
Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
	Route::group(['prefix' => 'cate'], function(){
		Route::get('list',['as' => 'admin.cate.getList','uses'=>'CateController@getList']);
		Route::get('add',['as' => 'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as' => 'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('delete/{id}',['as' => 'admin.cate.getDelete','uses'=>'CateController@getDelete']);
		Route::get('edit/{id}',['as' => 'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as' => 'admin.cate.postEdit','uses'=>'CateController@postEdit']);
		Route::get('search',['as'=>'admin.cate.getSearch','uses'=>'CateController@getSearch']);
		
	});
	Route::group(['prefix' => 'product'] ,function(){
		Route::get('list',['as' => 'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('add',['as' => 'admin.product.getAdd' , 'uses'=>'ProductController@getAdd']);
		Route::post('add',['as' => 'admin.product.postAdd' , 'uses'=>'ProductController@postAdd']);
      	Route::get('delete/{id}',['as' => 'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{id}',['as' => 'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as' => 'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		Route::get('delimg/{id}',['as' => 'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
	});

    Route::group(['prefix' => 'user'] ,function(){
        Route::get('list',['as' => 'admin.user.getList','uses'=>'UserController@getList']);
        Route::get('add',['as' => 'admin.user.getAdd' , 'uses'=>'UserController@getAdd']);
        Route::post('add',['as' => 'admin.user.postAdd' , 'uses'=>'UserController@postAdd']);
        Route::get('delete/{id}',['as' => 'admin.user.getDelete','uses'=>'UserController@getDelete']);
        Route::get('edit/{id}',['as' => 'admin.user.getEdit','uses'=>'UserController@getEdit']);
        Route::post('edit/{id}',['as' => 'admin.user.postEdit','uses'=>'UserController@postEdit']);
    });

    Route::group(['prefix' => 'transaction'] ,function(){
        Route::get('list',['as' => 'admin.transaction.getList','uses'=>'TransactionController@getList']);
//        Route::get('add',['as' => 'admin.user.getAdd' , 'uses'=>'UserController@getAdd']);
//        Route::post('add',['as' => 'admin.user.postAdd' , 'uses'=>'UserController@postAdd']);
//        Route::get('delete/{id}',['as' => 'admin.user.getDelete','uses'=>'UserController@getDelete']);
//        Route::get('edit/{id}',['as' => 'admin.user.getEdit','uses'=>'UserController@getEdit']);
//        Route::post('edit/{id}',['as' => 'admin.user.postEdit','uses'=>'UserController@postEdit']);
    });

    Route::group(['prefix' => 'report'] ,function(){
        Route::get('tunover',['as' => 'admin.report.tunover','uses'=>'ReportController@tunover']);
        Route::get('/getturnover',['as' => 'admin.report.getturnover', 'uses' => 'ReportController@getturnover']);
    });
	
	
	
});
Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);
Route::get('lien-he',['as' => 'getLienhe','uses'=>'WelcomeController@get_lienhe']);
Route::post('lien-he',['as' => 'postLienhe','uses'=>'WelcomeController@post_lienhe']);
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang', 'uses' => 'WelcomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang', 'uses' => 'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham', 'uses' => 'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
Route::get('search-home',['as'=>'searchHome','uses'=>'WelcomeController@searchProduct']);
Route::get('order/checkout',['as'=>'checkout','uses'=>'OrderController@getCheckout']);
Route::post('order/checkout',['as'=>'checkout','uses'=>'OrderController@postCheckout']);
