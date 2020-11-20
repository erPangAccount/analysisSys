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

Route::get('/', function () {
    return view('welcome');
});

// 后台管理页面
Route::get('/admin', 'Admin\IndexController@index')->middleware('auth')->name('admin');

//后台登录
Route::get('/login', 'Admin\LoginController@index')->name('login');
Route::post('/login', 'Admin\LoginController@login')->name('login_p');


// 用户使用页面
Route::get('/home', 'Home\IndexController@index');