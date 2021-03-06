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

Route::get('/', 'HomeController@welcome');



Auth::routes();


// Route::get('/products', 'ProductController@index')
// Route::post('/addproduct', 'ProductController@addProduct')->name('addproduct');



Route::get('/shop', function(){
    return view('shop');})->name('shop');

Route::middleware('auth')->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::middleware('auth')->group(function () {

    Route::get('/admin_dashboard', function () {

        return view('admin.dashboard');

    })->name('admin.dashboard');

    Route::get('/categories', 'CategoryController@index');

    Route::resource('/customers', 'Admin\CustomerController');
});

});