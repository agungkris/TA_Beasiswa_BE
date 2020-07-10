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


Route::prefix('period')->group(function(){
    Route::get('/','PeriodController@index');
    Route::post('/','PeriodController@store');
    Route::get('/{id}','PeriodController@show');
    Route::post('/{id}','PeriodController@update');
    Route::delete('/{id}','PeriodController@destroy');
});
