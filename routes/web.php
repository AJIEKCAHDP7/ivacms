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


// Группа маршрутов для локализации приложения
Route::prefix(LangHelper::checkAvailableLocale(Request::segment(1)))->middleware('web')->group(function() {

    Route::get('/', function () {
        return view('default.index')->with(['title'=>'Application']);
    })->name('home');


    Auth::routes();
    // Установка путей для группы админки
    Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function () {
        Route::get('/',['uses'=>'Admin\DashboardController@index', 'as'=>'dashboard']);
    });



    //

   // Route::get('/home', 'HomeController@index')->name('home');


    //Route::get('/admin', ['as'=>'admin', 'middleware'=>'auth', 'uses'=>'Admin\IndexController@show']);


});


