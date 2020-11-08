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

Route::get('/user/update', 'User\UserController@update')->name("user.update");

Route::post('/user/update/update_save', 'User\UserController@updateSave')->name("user.update_save");

Route::get('/user/show/{id}','User\UserController@adminShow')->name("admin.user.show");

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

Route::get('/customer/fish/list_by_temperament/{value}', 'Customer\CustomerFishController@listByTemperament')->name("customer.fish.list_by_temperament");

Route::get('/customer/fish/list_by_size/{value}', 'Customer\CustomerFishController@listBySize')->name("customer.fish.list_by_size");

Route::post('/customer/fish/add-to-cart/{id}/{type}', 'Customer\CustomerCartController@addToCart')->name("customer.fish.add-to-cart");

Route::post('/customer/accessory/add-to-cart/{id}/{type}', 'Customer\CustomerCartController@addToCart')->name("customer.accessory.add-to-cart");

Route::post('/customer/remove-from-cart/{id}/{type}', 'Customer\CustomerCartController@removeFromCart')->name("customer.remove-from-cart");

Route::get('/customer/cart', 'Customer\CustomerCartController@cart')->name("customer.cart");

Route::post('/customer/cart/buy', 'Customer\CustomerCartController@buy')->name("customer.cart.buy");

Route::post('/customer/wish_list/add', 'Customer\CustomerWishListController@add')->name("customer.wish_list.add");

Route::get('/customer/wish_list/list', 'Customer\CustomerWishListController@show')->name("customer.wish_list.list");

Route::post('/customer/wish_list/delete', 'Customer\CustomerWishListController@delete')->name("customer.wish_list.delete");

Route::get('/admin/order/show/{id}', 'Admin\AdminOrderController@show')->name("admin.order.show");

Route::get('/admin/order/list', 'Admin\AdminOrderController@list')->name("admin.order.list");

Route::get('/admin/order/list_by_status/{value}', 'Admin\AdminOrderController@listByStatus')->name("admin.order.list_by_status");

Route::get('/admin/order/update', 'Admin\AdminOrderController@update')->name("admin.order.update");

Route::post('/admin/order/update_save', 'Admin\AdminOrderController@updateSave')->name("admin.order.update_save");

Route::get('/customer/order/show/{id}', 'Customer\CustomerOrderController@show')->name("customer.order.show");

Route::get('/customer/order/list', 'Customer\CustomerOrderController@list')->name("customer.order.list");

Route::get('/customer/order/list_by_status/{value}', 'Customer\CustomerOrderController@listByStatus')->name("customer.order.list_by_status");

Route::post('/customer/order/cancel', 'Customer\CustomerOrderController@cancel')->name("customer.order.cancel");

Route::post('/customer/order/download', 'Customer\CustomerOrderController@bill')->name("customer.order.download");

Route::get('/admin/environmental_conditions/create', 'Admin\AdminEnvironmentalConditionController@create')->name("admin.environmental_condition.create");

Route::post('/admin/environmental_conditions/save', 'Admin\AdminEnvironmentalConditionController@save')->name("admin.environmental_condition.save");

Route::get('/admin/environmental_conditions/show/{id}', 'Admin\AdminEnvironmentalConditionController@show')->name("admin.environmental_condition.show");

Route::get('/admin/environmental_conditions/update', 'Admin\AdminEnvironmentalConditionController@update')->name("admin.environmental_condition.update");

Route::get('/admin/environmental_conditions/list', 'Admin\AdminEnvironmentalConditionController@list')->name("admin.environmental_condition.list");

Route::post('/admin/environmental_conditions/update_save', 'Admin\AdminEnvironmentalConditionController@updateSave')->name("admin.environmental_condition.update_save");

Route::get('/customer/fish/match/{id}/{temperament}', 'Customer\CustomerFishController@match')->name("customer.fish.match");

Route::get('lang/{lang}', 'User\LanguageController@switchLang')->name("lang.switch");

Route::get('/weather', 'Api\WeatherApi@showWeather')->name("weather.show");
