<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
Route::get('/update/category/{id}', 'CategoryController@UpdateCategory');
Route::post('/update/category/', 'CategoryController@UpdateCategoryPost');
Route::get('/delete/category/{id}', 'CategoryController@DestroyCategory');
Route::get('restore/category/{id}', 'CategoryController@RestoreCategory');
Route::get('hard-delete/category/{id}', 'CategoryController@HardDestroyCategory');


// Profile
Route::get('profile', 'ProfileController@index');
Route::post('profile/post', 'ProfileController@profile_post');
Route::post('password/post', 'ProfileController@password_post');
