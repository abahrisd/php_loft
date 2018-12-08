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
Route::get('/not-admin', 'HomeController@notAdmin')->name('not-admin');

Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@view')->name('products.view');
Route::get('/products/buy', 'ProductsController@buy')->name('products.buy');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{category}', 'CategoriesController@view')->name('categories.view');

Route::group([/*'prefix' => 'admin',*/ 'middleware' => ['auth', 'admin']], function () {
    Route::get('/products/{product}/destroy', 'ProductsController@destroy')->name('products.destroy');
    Route::get('/products/{product}/edit', 'ProductsController@edit')->name('products.edit');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');

    Route::get('/categories/{category}/destroy', 'CategoriesController@destroy')->name('categories.destroy');
    Route::get('/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
});

//Route::resource('/products', 'ProductsController');
//Route::resource('/categories', 'CategoriesController');
