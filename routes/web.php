<?php

use Illuminate\Support\Facades\Auth;
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


// Welcome page
Route::get('/', 'FrontendController@index');

// about page
Route::get('/about', 'FrontendController@about');

// contact page
Route::get('/contact', 'FrontendController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category routes
Route::get('/add/category', 'CategoryController@AddCategory');
Route::post('/store/category', 'CategoryController@StoreCategory');
