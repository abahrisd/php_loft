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

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/create', 'ProductsController@create')->middleware(['auth', 'admin'])->name('products.create');
Route::get('/products/{product}', 'ProductsController@view')->name('products.view');

Route::post('/products/buy', 'ProductsController@buy')->name('products.buy');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/create', 'CategoriesController@create')
    ->middleware(['auth', 'admin'])->name('categories.create');
Route::get('/categories/{category}', 'CategoriesController@view')->name('categories.view');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/orders', 'OrdersController@index')->name('orders.index');

    Route::get('/products/{product}/destroy', 'ProductsController@destroy')->name('products.destroy');
    Route::get('/products/{product}/edit', 'ProductsController@edit')->name('products.edit');
    Route::post('/products/store', 'ProductsController@store')->name('products.store');
    Route::put('/products/{product}', 'ProductsController@update')->name('products.update');

    Route::get('/categories/{category}/destroy', 'CategoriesController@destroy')->name('categories.destroy');
    Route::get('/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');

    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::put('/settings/{setting}', 'SettingsController@update')->name('settings.update');

//    Route::resource('/products', 'ProductsController');
//    Route::resource('/categories', 'CategoriesController');
});
