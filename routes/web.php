<?php
Route::get('/','StaticPagesController@home')->name('home');
Route::get('/about','StaticPagesController@about')->name('about');
Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/signup','User\UserContorller@create')->name('signup');
Route::resource('users','User\UserContorller');

#login route
Route::get('login','SessionController@login')->name('login');
Route::post('login','SessionController@store')->name('login');
Route::delete('logout','SessionController@destory')->name('logout');

Route::get('signup/confirm/{token}','User\UserContorller@confirmEmail')->name('confirm_email');
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
