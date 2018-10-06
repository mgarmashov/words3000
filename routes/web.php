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

Route::group(['middleware' => 'lang'], function() {
    Route::get('/', 'ShowWordsController@index')->name('index');
    Auth::routes();
});


Route::get('/lang/{locale?}', 'LangController@set')->name('lang');

Route::group(['middleware' => 'auth'], function(){
    Route::get('set-favorite', 'ActionsWordsController@setFavorite')->name('set-favorite');
    Route::get('unset-favorite', 'ActionsWordsController@unsetFavorite')->name('unset-favorite');
});



// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login')->name('toLogin');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/home', 'HomeController@index')->name('home');
