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

Route::get('/', 'NewsController@dashboard');
Route::get('/news/{slug}','NewsController@news');
Route::get('/search','NewsController@search');

// User Route
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/post-login', 'AuthController@postLogin'); 
Route::get('/registration', 'AuthController@registration');
Route::post('/post-registration', 'AuthController@postRegistration'); 
Route::get('/logout', 'AuthController@logout');

// Admin Route
Route::get('/admin','AdminController@index')->name('admin-dashboard');
Route::get('/admin/add-news','AdminController@addNews')->name('add-news');
Route::post('/post-news','AdminController@postAddNews')->name('post-news');
Route::get('/admin/news/delete/{slug}','AdminController@deleteNews');
Route::get('/admin/news/edit/{slug}', 'AdminController@editNews');
Route::post('/edit-news','AdminController@postEditNews')->name('edit-news');
