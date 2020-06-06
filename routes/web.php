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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/modulo/{modulo?}', function () {
    return view('admin.layouts.app');
});

//admin vue category
Route::get('category/list', 'CategoryController@index');
Route::post('category/creare', 'CategoryController@store');
Route::post('category/update', 'CategoryController@update');
Route::get('/category/remove/{id?}', 'CategoryController@destroy');
Route::get('/category/list_category', 'CategoryController@list_category');

//admin vue product
Route::get('product/list', 'ProductController@index');
Route::post('product/create', 'ProductController@store');
Route::post('product/update', 'ProductController@update');
Route::get('/product/remove/{id?}', 'ProductController@destroy');
Route::post('/ubload/galery','ProductController@galery');
Route::get('/list/galery/{id?}','ProductController@galeryListar');
Route::get('/list/galery/delete/{id?}','ProductController@galeryListarDelete');


