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

//ADMIN AREA
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function() {
    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);
    Route::resource('categories', 'CategoryController', [
        'names' => 'admin.categories',
        'except' => 'show'
    ]);
    Route::resource('products', 'ProductController', [
        'names' => 'admin.products',
        'except' => 'show'
    ]);
    Route::post('add-characteristic/{product}', [
        'uses' => 'ProductController@addCharacteristics',
        'as' => 'add-characteristics'
    ]);
    Route::resource('characteristics', 'CharacteristicController', [
        'names' => 'admin.categories',
        'only' => ['store', 'destroy']
    ]);
});
