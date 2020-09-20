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

// Route::middleware('auth:sanctum')->get('/auth', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/auth')->group(function () {
    Route::get('/', 'AuthController@getUser')->middleware('auth:sanctum');
    Route::post('/login', 'AuthController@loginToken');
    Route::post('/register', 'AuthController@register');

    Route::middleware('auth:sanctum')->prefix('users')->group(function () {
        Route::get('/', 'UsersController@index');
        Route::post('/create', 'UsersController@store');
        Route::get('/get/{id}', 'UsersController@show');
        Route::post('/update/{id}', 'UsersController@update');
        Route::delete('/delete/{id}', 'UsersController@destroy');
    });
});

Route::prefix('/vue')->group(function () {
    Route::prefix('tahun')->group(function () {
        Route::get('/', 'GraduationTahunController@index');
        Route::post('/create', 'GraduationTahunController@store');
        Route::get('/get/{id}', 'GraduationTahunController@show');
        Route::post('/update/{id}', 'GraduationTahunController@update');
    });
    Route::prefix('fakultas')->group(function () {
        Route::get('/', 'FakultasController@index');
        Route::post('/create', 'FakultasController@store');
        Route::get('/get/{id}', 'FakultasController@show');
        Route::post('/update/{id}', 'FakultasController@update');
    });
    Route::prefix('prodi')->group(function () {
        Route::get('/', 'ProdiController@index');
        Route::post('/create', 'ProdiController@store');
        Route::get('/get/{id}', 'ProdiController@show');
        Route::post('/update/{id}', 'ProdiController@update');
    });
});
