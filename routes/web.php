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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'FigmaController@index')->name('home');
Route::get('product/create','FigmaController@create')->name('product.create');
Route::post('product/create','FigmaController@store')->name('product.store');
Route::get('product/{product}/edit','FigmaController@edit')->name('product.edit');
Route::patch('product/{product}/update','FigmaController@update')->name('product.update');
Route::delete('product/{product}/delete','FigmaController@destroy')->name('product.destroy');
Route::get('/product/{product}','FigmaController@show')->name('product.show');
Route::get('product/kategori/{id}','FigmaController@showProductByKategori')->name('product.show-by-kategori');

Route::get('/user/profile','ProfileController@edit')->name('profile.edit');
Route::patch('/user/profile','ProfileController@update')->name('profile.update');

Route::get('/add-To-Cart/{id}','FigmaController@getAddToCart')->name('product.addToCart');
Route::get('/shopping-cart/','FigmaController@getCart')->name('product.shoppingCart');