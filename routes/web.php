<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Home Page
Route::get('/', 'FrontendController@index');

// About Page
Route::get('/about', 'FrontendController@about')->name('about');

// Product Page
Route::get('product/{id}', 'FrontendController@product');

// Contact Page
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('contact/post', 'FrontendController@ContactStore');

// FAQ
Route::get('/faqs', 'FrontendController@Faq');

// Shop
Route::get('/shop', 'FrontendController@Shop');

// Blog Page
Route::get('/blogs', 'FrontendController@Blog');
Route::get('/blog/{blog}', 'FrontendController@showBlog');

// Cart
Route::post('/add/to/cart', 'CartController@CartAdd');
Route::get('cart', 'CartController@show');


// Message control admin
Route::get('/messages', 'MessageController@index')->name('messages');
Route::get('/messages/show/{message}', 'MessageController@show');
Route::get('messages/trash', 'MessageController@trash')->name('messages/trash');
Route::get('/messages/delete/{message}', 'MessageController@destroy');
Route::get('/messages/hard-delete/{id}', 'MessageController@HardDelete');
Route::get('/messages/restore/{id}', 'MessageController@restore');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

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

// Banner
Route::get('add/banner', 'BannerController@index')->name('add/banner');
Route::get('update/banner/{banner}', 'BannerController@edit');
Route::post('update/banner/', 'BannerController@update');
Route::post('store/banner', 'BannerController@store');
Route::get('delete/banner/{banner}', 'BannerController@destroy');
Route::get('restore/banner/{banner}', 'BannerController@restore');
Route::get('hard-delete/banner/{banner}', 'BannerController@hardDelete');

// Products
Route::get('add/products', 'ProductController@index')->name('add/products');
Route::post('store/product', 'ProductController@store');
Route::get('product/update/{product}', 'ProductController@edit');
Route::post('product/update/', 'ProductController@update');
Route::get('product/delete/{product}', 'ProductController@destroy');
Route::get('product/restore/{id}', 'ProductController@restore');
Route::get('product/hard-delete/{id}', 'ProductController@harddestroy');


// Testimonial
Route::get('add/testimonials', 'TestimonialController@index');
Route::post('store/testimonial', 'TestimonialController@store');
Route::get('update/testimonial/{testimonial}', 'TestimonialController@edit');
Route::post('update/testimonial', 'TestimonialController@update');
Route::get('/delete/testimonial/{testimonial}', 'TestimonialController@destroy');


// FAQ
Route::get('add/faqs', 'FaqController@index');
Route::post('store/faq', 'FaqController@store');
Route::get('/delete/faq/{faq}', 'FaqController@destroy');

// FAQ
Route::get('add/blogs', 'BlogController@index');
Route::post('store/blog', 'BlogController@store');
Route::get('update/blog/{blog}', 'BlogController@edit');
Route::post('blog/update/', 'BlogController@update');
Route::get('delete/blog/{blog}', 'BlogController@destroy');
Route::get('restore/blog/{id}', 'BlogController@restore');
Route::get('hard-delete/blog/{id}', 'BlogController@harddestroy');
