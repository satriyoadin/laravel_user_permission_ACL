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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
	// Route::resource('roles','RoleController');
 //    Route::resource('users','UserController');
 //    Route::resource('products','ProductsController');
	//User Route
	Route::get('/user', 'UserController@index')->name('user.index');
	Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
	Route::get('/user/{id}/delete', 'UserController@delete')->name('user.delete');
	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::post('/user/create/store', 'UserController@store')->name('user.store');
	Route::post('/user/update', 'UserController@update')->name('user.update');
	//Role route
	Route::get('/role', 'RoleController@index')->name('role.index');
	Route::get('/role/{id}/edit', 'RoleController@edit')->name('role.edit');
	Route::get('/role/{id}/delete', 'RoleController@delete')->name('role.delete');
	Route::get('/role/create', 'RoleController@create')->name('role.create');
	Route::post('/role/create/store', 'RoleController@store')->name('role.store');
	Route::post('/role/update', 'RoleController@update')->name('role.update');
	//Product route
	Route::get('/products', 'ProductsController@index')->name('products.index');
	Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
	Route::get('/products/{id}/delete', 'ProductsController@delete')->name('products.delete');
	Route::get('/create', 'ProductsController@create')->name('products.create');
	Route::post('/create', 'ProductsController@store')->name('products.store');
	Route::post('/update', 'ProductsController@update')->name('products.update');
});



Route::get('/home', 'HomeController@index')->name('home');


