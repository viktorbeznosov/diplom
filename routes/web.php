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

Route::get('/', 'IndexController@show')->name('home');
Route::get('/category/{cat_id?}', 'ProductsController@category')->name('category');
Route::get('/product/{product_id?}', 'ProductsController@product')->name('product');
//Route::get('/login/', 'LoginController@show')->name('login');
//Route::get('/register/', 'RegisterController@show')->name('register');
Route::get('/card/', 'CardController@show')->name('card');
Route::get('/order/', 'OrderController@show')->name('order');
Route::post('/order_confirm/', 'OrderController@confirm')->name('order.confirm');
Route::get('/order_done/{order_id}', 'OrderController@done')->name('order.done');
Route::post('/order_info', 'OrderController@info')->name('order.info');
Route::get('/account/', 'LoginController@account')->middleware('auth')->name('account');
Route::post('/account/', 'LoginController@updateUser')->name('user_update');


Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login')->name('admin.login.post');
Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){

    Route::get('/', 'Admin\IndexController@show')->name('admin');
    Route::prefix('order')->group(function(){
        Route::get('/all/', 'Admin\OrdersController@orders')->name('admin.order.all');
        Route::get('/show/{order_id?}', 'Admin\OrdersController@order')->name('admin.order.show');
        Route::post('/good/delete/{order_good_id}', 'Admin\OrdersController@orderGoodDelete')->name('admin.order.good.delete');
        Route::post('/delete/{order_id}', 'Admin\OrdersController@orderDelete')->name('admin.order.delete');
        Route::post('/update/{order_id}', 'Admin\OrdersController@orderUpdate')->name('admin.order.update');
            Route::`get`('/change_status/', 'Admin\OrdersController@ajaxOrderChangeStatus')->name('admin.order.change.status');

    });

    Route::prefix('user')->group(function (){
        Route::get('/show/{user_id?}', 'Admin\UsersController@user')->name('admin.user.show');
        Route::get('/all/', 'Admin\UsersController@users')->name('admin.user.all');
        Route::post('/update/{user_id}', 'Admin\UsersController@userUpdate')->name('admin.user.update');
        Route::post('/delete/{user_id}', 'Admin\UsersController@userDelete')->name('admin.user.delete');
    });

    Route::prefix('category')->group(function (){
        Route::get('/show/{category_id?}', 'Admin\ProductsController@category')->name('admin.category.show');
        Route::get('/all/', 'Admin\ProductsController@categories')->name('admin.category.all');
        Route::post('/add/','Admin\ProductsController@categoryAdd')->name('admin.category.add');
        Route::post('/update/{category_id}','Admin\ProductsController@categoryUpdate')->name('admin.category.update');
        Route::post('/delete/{category_id}','Admin\ProductsController@categoryDelete')->name('admin.category.delete');
    });

    Route::prefix('product')->group(function (){
        Route::get('/show/{product_id?}', 'Admin\ProductsController@product')->name('admin.product.show');
        Route::post('/update/{product_id?}', 'Admin\ProductsController@productUpdate')->name('admin.product.update');
        Route::get('/add/{category_id}', 'Admin\ProductsController@productAdd')->name('admin.product.add');
        Route::post('/add/', 'Admin\ProductsController@productAdd')->name('admin.product.add.post');
        Route::post('/delete/{product_id}', 'Admin\ProductsController@productDelete')->name('admin.product.delete');
    });


});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
