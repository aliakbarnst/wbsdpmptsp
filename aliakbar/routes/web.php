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

Route::prefix('/')->group(function(){

    Route::prefix('/registrasi')->group(function(){
        Route::resource('/','Backend\RegistrasiController');
    });

    Route::get('/', "Frontend\HomeController@index");   
    Route::get('/statistik', "Frontend\HomeController@statistik");
    Route::get('/faq', "Frontend\HomeController@faq");

});

Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'],function()
{
    Route::get('/', "Backend\DashboardController@index");
    
    Route::prefix('/pengaduan')->group(function(){
        Route::resource('/','Backend\PengaduanController');
        Route::get('/table','Backend\PengaduanController@table');
        Route::get('/edit/{id}','Backend\PengaduanController@edit');
        Route::patch('/update/{id}','Backend\PengaduanController@update');
        Route::delete('/delete/{id}','Backend\PengaduanController@destroy');
        Route::get('/table-file/{id}','Backend\PengaduanController@tableFile');
        Route::get('/detail/{id}','Backend\PengaduanController@detail');
    });

    Route::prefix('/pengaduan-diterima')->group(function(){
        Route::resource('/','Backend\PengaduanDiterimaController');
        Route::get('/table','Backend\PengaduanDiterimaController@table');
        Route::get('/edit/{id}','Backend\PengaduanDiterimaController@edit');
        Route::patch('/update/{id}','Backend\PengaduanDiterimaController@update');
        Route::delete('/delete/{id}','Backend\PengaduanDiterimaController@destroy');
        Route::get('/table-file/{id}','Backend\PengaduanDiterimaController@tableFile');
        Route::get('/detail/{id}','Backend\PengaduanDiterimaController@detail');
    });

    Route::prefix('/faq')->group(function(){
        Route::resource('/','Backend\FaqController');
        Route::get('/table','Backend\FaqController@table');
        Route::get('/edit/{id}','Backend\FaqController@edit');
        Route::patch('/update/{id}','Backend\FaqController@update');
        Route::delete('/delete/{id}','Backend\FaqController@destroy');
    });

    Route::prefix('/pengaturan')->group(function(){
        Route::resource('/','Backend\PengaturanController');
        Route::get('/table','Backend\PengaturanController@table');
        Route::get('/edit/{id}','Backend\PengaturanController@edit');
        Route::patch('/update/{id}','Backend\PengaturanController@update');
        Route::delete('/delete/{id}','Backend\PengaturanController@destroy');
    });

    Route::prefix('/level-user')->group(function(){
        Route::resource('/','Backend\LevelUserController');
        Route::get('/table','Backend\LevelUserController@table');
        Route::get('/edit/{id}','Backend\LevelUserController@edit');
        Route::patch('/update/{id}','Backend\LevelUserController@update');
        Route::delete('/delete/{id}','Backend\LevelUserController@destroy');
    });

    Route::prefix('/user')->group(function(){
        Route::resource('/','Backend\UserController');
        Route::get('/table','Backend\UserController@table');
        Route::get('/edit/{id}','Backend\UserController@edit');
        Route::patch('/update/{id}','Backend\UserController@update');
        Route::delete('/delete/{id}','Backend\UserController@destroy');
    });


    Route::prefix('/slider')->group(function(){
        Route::resource('/','Backend\SliderController');
        Route::get('/table','Backend\SliderController@table');
        Route::get('/edit/{id}','Backend\SliderController@edit');
        Route::patch('/update/{id}','Backend\SliderController@update');
        Route::delete('/delete/{id}','Backend\SliderController@destroy');
    });
    
});