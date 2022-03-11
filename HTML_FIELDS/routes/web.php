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

Route::get('/', 'GeneralController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/home','AdminController@index')->name('Admin_Dashboard');
    Route::get('/add/form','AdminController@addform');
    Route::post('add/fields', 'AdminController@add');
    Route::get('/edit/form/{id}','AdminController@editform');
    Route::post('update/form', 'AdminController@updateform');
    Route::get('delete/field/{id}','AdminController@deletefield');
});
