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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin','middleware' => 'auth'] ,function(){

    Route::get('/products', [
        'uses' => 'PostsController@index',
        'as' => 'products'
    ]);

    Route::get('/product/create', [ 
        'uses' => 'ProductsController@create',
        'as' => 'product.create'
    ]);

    Route::get('/product/edit/{id}', [
        'uses' => 'ProductsController@edit',
        'as' => 'product.edit'
    ]);

});