<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Route::group(['middleware' => ['guest']], function () {


    Route::get('/login', 'Auth\AuthController@showLoginForm')->name('login');
    // Handle login form submission
    Route::post('/login', 'Auth\AuthController@login');
    // Handle logout
    Route::post('/logout', 'Auth\AuthController@logout')->name('logout');
    Route::get('/forgot-password', 'Auth\AuthController@showForgotPasswordForm')->name('password.request');
    // Send reset password link
    Route::post('/forgot-password', 'Auth\AuthController@sendResetLinkEmail')->name('password.email');
    // Show reset password form
    Route::get('/reset-password/{token}', 'Auth\AuthController@showResetPasswordForm')->name('password.reset');
    // Reset password
    Route::post('/reset-password', 'Auth\AuthController@resetPassword')->name('password.update');
});


Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/', 'AdminHomeController@index')->name('home');
    Route::get('/home', 'AdminHomeController@index')->name('home');
    Route::get('/dashboard', 'AdminHomeController@index')->name('home');


    Route::resource('users', 'AdminHomeController');
    Route::resource('services', 'ServiceController');
    Route::resource('portfolios', 'PortfolioController');
    Route::resource('faqs', 'FaqController');
    Route::resource('blogs', 'BlogController');

    Route::resource('testimonials', 'TestimonialController');

});
