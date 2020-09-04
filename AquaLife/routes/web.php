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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/index', 'HomeController@index')->name("home.index");

Route::get('/admin/accessory/show/{id}', 'AccessoryController@show')->name("accessory.show");

Route::get('/admin/accessory/create', 'AccessoryController@create')->name("accessory.create");

Route::post('admin/accessory/save', 'AccessoryController@save')->name("accessory.save");

Route::post('/admin/accessory/delete', 'AccessoryController@delete')->name("accessory.delete");

Route::get('/admin/accessory/list', 'AccessoryController@list')->name("accessory.list");

Auth::routes();
