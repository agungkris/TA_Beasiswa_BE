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
    Route::middleware('auth:sanctum')->prefix('scholarshipsubmissions')->group(function () {
        Route::get('/', 'ScholarshipSubmissionsController@index');
        Route::post('/create', 'ScholarshipSubmissionsController@store');
        Route::get('/get/{id}', 'ScholarshipSubmissionsController@show');
        Route::post('/update/{id}', 'ScholarshipSubmissionsController@update');
        Route::delete('/delete/{id}', 'ScholarshipSubmissionsController@destroy');
    });
    Route::prefix('scholarshipstudentgroupmembers')->group(function () {
        Route::get('/', 'ScholarshipStudentGroupMembersController@index');
        Route::post('/create', 'ScholarshipStudentGroupMembersController@store');
        Route::get('/get/{id}', 'ScholarshipStudentGroupMembersController@show');
        Route::post('/update/{id}', 'ScholarshipStudentGroupMembersController@update');
        Route::delete('/delete/{id}', 'ScholarshipStudentGroupMembersController@destroy');
    });
    Route::prefix('scholarshippaperassessments')->group(function () {
        Route::get('/', 'ScholarshipPaperAssessmentsController@index');
        Route::post('/create', 'ScholarshipPaperAssessmentsController@store');
        Route::get('/get/{id}', 'ScholarshipPaperAssessmentsController@show');
        Route::post('/update/{id}', 'ScholarshipPaperAssessmentsController@update');
        Route::delete('/delete/{id}', 'ScholarshipPaperAssessmentsController@destroy');
    });
    Route::prefix('scholarshippresentationassessments')->group(function () {
        Route::get('/', 'ScholarshipPresentationAssessmentsController@index');
        Route::post('/create', 'ScholarshipPresentationAssessmentsController@store');
        Route::get('/get/{id}', 'ScholarshipPresentationAssessmentsController@show');
        Route::post('/update/{id}', 'ScholarshipPresentationAssessmentsController@update');
        Route::delete('/delete/{id}', 'ScholarshipPresentationAssessmentsController@destroy');
    });
    Route::prefix('scholarshipcategoryjury')->group(function () {
        Route::get('/', 'ScholarshipCategoryJuryController@index');
        Route::post('/create', 'ScholarshipCategoryJuryController@store');
        Route::get('/get/{id}', 'ScholarshipCategoryJuryController@show');
        Route::post('/update/{id}', 'ScholarshipCategoryJuryController@update');
        Route::delete('/delete/{id}', 'ScholarshipCategoryJuryController@destroy');
    });
});
