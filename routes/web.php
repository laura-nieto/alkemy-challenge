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

Route::get('/','CategoryController@index');

Route::get('/apps','AppController@index');

Route::get('/apps/{category_name}','CategoryController@show');

Route::get('/app/{id}','AppController@show');
Route::post('/app/{id}','ShopsController@store');

Route::get('/me/{id}','UserController@show')->middleware('auth');

Route::get('/new/app','AppController@create')->middleware('auth','developer');
Route::post('/new/app','AppController@store')->middleware('auth','developer');

Route::get('/remove/{id}','AppController@remove')->middleware('auth','developer');
Route::post('/remove/{id}','AppController@destroy')->middleware('auth','developer');

Route::get('/update/{id}','AppController@edit')->middleware('auth','developer');
Route::post('/update/{id}','AppController@update')->middleware('auth','developer');


Route::get('/login', function(){
    return view('login');
});
Route::post('/login', 'UserController@login')->name('login');


Route::get('/register', 'UserController@create');
Route::post('/register', 'UserController@store');

Route::get('/logOut','UserController@logOut');


// Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
