<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
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

Route::get('/', 'IndexController@index')->name('index');

Route::post('/contact', 'IndexController@send')->name('send');
Route::get('about', 'IndexController@about')->name('about');
Route::get('services', 'IndexController@services')->name('services');
Route::get('service/{slug}', 'IndexController@service')->name('service');
Route::get('portfolio', 'IndexController@portfolio')->name('portfolio');
Route::get('case-studies', 'IndexController@case_studies')->name('case-studies');
Route::get('blogs', 'IndexController@blogs')->name('blogs');
Route::get('blog/{slug}', 'IndexController@blog')->name('blog');
Route::get('contact', 'IndexController@contact')->name('contact');
Route::get('{slug}', 'IndexController@page')->name('page');
