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

Route::match(['get', 'post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/index', 'AdminController@index');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@CheckPassword');
    Route::match(['get','post'],'/admin/update-pwd', 'AdminController@updatePassword');

    //Categories Routes (Admin Panel)
    Route::match(['get','post'],'/admin/create_category','CategoryController@CreateCategory');
    Route::match(['get','post'],'/admin/edit_category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete_category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view_categories', 'CategoryController@viewCategories');

    //Products Routes (Admin Panel)
    Route::match(['get','post'],'/admin/add_product','ProductsController@addProduct');

});

Route::get('/logout', 'AdminController@logout');