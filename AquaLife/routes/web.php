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

Route::post('admin/accessory/save', 'Admin\AdminAccessoryController@save')->name("admin.accessory.save");

Route::post('/admin/accessory/delete', 'Admin\AdminAccessoryController@delete')->name("admin.accessory.delete");

Route::get('/admin/accessory/list', 'Admin\AdminAccessoryController@list')->name("admin.accessory.list");

Auth::routes();

Route::get('/user/show','User\UserController@show')->name("user.show");

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");
