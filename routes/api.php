<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
    Route::post('/login','AuthController@loginToken');
    Route::post('/register','AuthController@register');

});


Route::prefix('period')->group(function(){
    Route::get('/','PeriodController@index');
    Route::post('/','PeriodController@store');
    Route::get('/{id}','PeriodController@show');
    Route::post('/{id}','PeriodController@update');
    Route::delete('/{id}','PeriodController@destroy');
});

Route::prefix('student-groups')->group(function(){
    Route::get('/','StudentGroupController@index');
    Route::post('/','StudentGroupController@store');
    Route::get('/{id}','StudentGroupController@show');
    Route::post('/{id}','StudentGroupController@update');
    Route::delete('/{id}','StudentGroupController@destroy');
});


Route::prefix('command-center')->namespace('CommandCenter')->group(function(){
    Route::prefix('kategori-lingkup')->group(function(){
        Route::get('/','KategoriLingkupController@index');
        Route::post('/','KategoriLingkupController@store');
        Route::get('/{id}','KategoriLingkupController@show');
        Route::post('/{id}','KategoriLingkupController@update');
        Route::delete('/{id}','KategoriLingkupController@destroy');
    });


});


