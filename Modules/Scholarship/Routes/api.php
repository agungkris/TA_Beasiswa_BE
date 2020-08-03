<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/scholarship', function (Request $request) {
    return $request->user();
});

Route::prefix('/scholarship')->group(function () {
    Route::prefix('periods')->group(function () {
        Route::get('/', 'ScholarshipPeriodController@index');
        Route::post('/create', 'ScholarshipPeriodController@store');
        Route::get('/get/{id}', 'ScholarshipPeriodController@show');
        Route::post('/update/{id}', 'ScholarshipPeriodController@update');
        Route::delete('/delete/{id}', 'ScholarshipPeriodController@destroy');
    });
    Route::prefix('studentgroup')->group(function () {
        Route::get('/', 'ScholarshipStudentGroupController@index');
        Route::post('/create', 'ScholarshipStudentGroupController@store');
        Route::get('/get/{id}', 'ScholarshipStudentGroupController@show');
        Route::post('/update/{id}', 'ScholarshipStudentGroupController@update');
        Route::delete('/delete/{id}', 'ScholarshipStudentGroupController@destroy');
    });
    Route::prefix('scholarshipinformation')->group(function () {
        Route::get('/', 'ScholarshipInformationController@index');
        Route::post('/create', 'ScholarshipInformationController@store');
        Route::get('/get/{id}', 'ScholarshipInformationController@show');
        Route::post('/update/{id}', 'ScholarshipInformationController@update');
        Route::delete('/delete/{id}', 'ScholarshipInformationController@destroy');
    });
});
