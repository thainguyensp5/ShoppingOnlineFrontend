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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'CategoryController@index',
]);

Route::get('/product/{id}', [
    'as' => 'product.detail',
    'uses' => 'ProductController@index',
]);

Route::post('/cart/{id}', [
    'as' => 'cart.cart_show',
    'uses' => 'CartController@store',
]);

Route::get('/cart/show_cart', [
    'as' => 'cart.show_cart',
    'uses' => 'CartController@index',
]);

Route::get('/cart/delete-cart/{id}', [
    'as' => 'delete.cart',
    'uses' => 'CartController@delete',
]);

Route::get('/cart/update-cart/',  [
    'as' => 'cart.update_quantity',
    'uses' => 'CartController@update',
]);