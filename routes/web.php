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
    return redirect('v1/admin');
});


/**
 * 1.0版本 为实现简单的成绩分析,没有添加任何其他功能
 */
Route::group(['prefix' => 'v1'], function () {
    /**
     * 后台管理页面
     */
    Route::get('/admin', 'V1\Admin\IndexController@index')->middleware('auth')->name('v1_admin');

    /**
     * 后台登录
     */
    Route::get('/login', 'V1\Admin\LoginController@index')->name('v1_login');
    Route::post('/login', 'V1\Admin\LoginController@login')->name('v1_login_p');
    Route::get('/logout', 'V1\Admin\LoginController@logout')->name('v1_logout');

    /**
     * 简单成绩分析功能
     */
    Route::group(['prefix' => 'analysis'], function () {
        Route::get('/index', 'V1\Admin\SampleAnalysisController@index')->name('v1_sampleAnalysis');
        Route::get('/export', 'V1\Admin\SampleAnalysisController@exportExcel')->name('v1_exportExcel');
    });
});





