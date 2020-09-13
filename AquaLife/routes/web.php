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

Route::get('/index', 'HomeController@index')->name("home.index");

Route::get('/admin/accessory/show/{id}', 'Admin\AdminAccessoryController@show')->name("admin.accessory.show");

Route::get('/admin/accessory/create', 'Admin\AdminAccessoryController@create')->name("admin.accessory.create");

Route::get('/admin/accessory/update', 'Admin\AdminAccessoryController@update')->name("admin.accessory.update");

Route::post('/admin/accessory/update_save', 'Admin\AdminAccessoryController@updateSave')->name("admin.accessory.update_save");

Route::post('admin/accessory/save', 'Admin\AdminAccessoryController@save')->name("admin.accessory.save");

Route::post('/admin/accessory/delete', 'Admin\AdminAccessoryController@delete')->name("admin.accessory.delete");

Route::get('/admin/accessory/list', 'Admin\AdminAccessoryController@list')->name("admin.accessory.list");

Route::get('/customer/accessory/list', 'Customer\CustomerAccessoryController@list')->name("customer.accessory.list");

Route::get('/customer/accessory/list_by/{value}', 'Customer\CustomerAccessoryController@listBy')->name("customer.accessory.list_by");

Auth::routes();

Route::get('/user/show','User\UserController@show')->name("user.show");

Route::get('/', 'HomeController@index')->name("home.index");

Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");


Route::get('/admin/fish/show/{id}', 'Admin\AdminFishController@show')->name("admin.fish.show");

Route::get('/admin/fish/create', 'Admin\AdminFishController@create')->name("admin.fish.create");

Route::post('/admin/fish/save', 'Admin\AdminFishController@save')->name("admin.fish.save");

Route::post('/admin/fish/delete', 'Admin\AdminFishController@delete')->name("admin.fish.delete");

Route::get('/admin/fish/list', 'Admin\AdminFishController@list')->name("admin.fish.list");

Route::get('/admin/fish/update', 'Admin\AdminFishController@update')->name("admin.fish.update");

Route::post('/admin/fish/update_save', 'Admin\AdminFishController@updateSave')->name("admin.fish.update_save");

Route::get('/customer/fish/list', 'Customer\CustomerFishController@list')->name("customer.fish.list");

Route::get('/customer/fish/list_by/{value}', 'Customer\CustomerFishController@listBy')->name("customer.fish.list_by");

Route::post('/customer/fish/add-to-cart/{id}/{type}', 'Customer\CustomerCartController@addToCart')->name("customer.fish.add-to-cart");

Route::post('/customer/accessory/add-to-cart/{id}/{type}', 'Customer\CustomerCartController@addToCart')->name("customer.accessory.add-to-cart");

Route::post('/customer/remove-from-cart/{id}/{type}', 'Customer\CustomerCartController@removeFromCart')->name("customer.remove-from-cart");

Route::get('/customer/cart', 'Customer\CustomerCartController@cart')->name("customer.cart");

Route::post('/customer/cart/buy', 'Customer\CustomerCartController@buy')->name("customer.cart.buy");

Route::post('/customer/wishList/add', 'Customer\CustomerWishListController@add')->name("customer.wishList.add");

Route::get('/customer/wishList/show/wishList', 'Customer\CustomerWishListController@show')->name("customer.wishList.show");

Route::post('/customer/wishList/delete', 'Customer\CustomerWishListController@delete')->name("customer.wishList.delete");
