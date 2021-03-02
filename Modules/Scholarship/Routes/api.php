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
        Route::get('/random', 'ScholarshipStudentGroupController@randomMember');
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
        Route::post('/nextstage/{id}', 'ScholarshipSubmissionsController@next_Stage');
        Route::post('/finalstage/{id}', 'ScholarshipSubmissionsController@final_Stage');
        Route::delete('/delete/{id}', 'ScholarshipSubmissionsController@destroy');
        Route::post('/report', 'ScholarshipSubmissionsController@report');
        Route::post('/reportnew', 'ScholarshipSubmissionsController@reportNew');
        Route::post('/kmeans', 'ScholarshipSubmissionsController@kmeans');
        Route::post('/submit-scholarship', 'ScholarshipSubmissionsController@submitscholarship');
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
        Route::post('/create/{id}', 'ScholarshipPaperAssessmentsController@store');
        Route::get('/get/{id}', 'ScholarshipPaperAssessmentsController@show');
        Route::get('/report', 'ScholarshipPaperAssessmentsController@report');
        Route::post('/update/{id}', 'ScholarshipPaperAssessmentsController@update');
        Route::delete('/delete/{id}', 'ScholarshipPaperAssessmentsController@destroy');
    });
    Route::prefix('scholarshippresentationassessments')->group(function () {
        Route::get('/', 'ScholarshipPresentationAssessmentsController@index');
        Route::post('/create/{id}', 'ScholarshipPresentationAssessmentsController@store');
        Route::get('/get/{id}', 'ScholarshipPresentationAssessmentsController@show');
        Route::get('/report', 'ScholarshipPresentationAssessmentsController@report');
        Route::post('/update/{id}', 'ScholarshipPresentationAssessmentsController@update');
        Route::delete('/delete/{id}', 'ScholarshipPresentationAssessmentsController@destroy');
        Route::get('/final', 'ScholarshipPresentationAssessmentsController@final');
    });
    Route::prefix('scholarshipcategoryjury')->group(function () {
        Route::get('/', 'ScholarshipCategoryJuryController@index');
        Route::post('/create', 'ScholarshipCategoryJuryController@store');
        Route::get('/get/{id}', 'ScholarshipCategoryJuryController@show');
        Route::post('/update/{id}', 'ScholarshipCategoryJuryController@update');
        Route::delete('/delete/{id}', 'ScholarshipCategoryJuryController@destroy');
    });
    Route::prefix('scholarshipannouncement')->group(function () {
        Route::get('/', 'ScholarshipAnnouncementController@index');
        Route::post('/create', 'ScholarshipAnnouncementController@store');
        Route::get('/get/{id}', 'ScholarshipAnnouncementController@show');
        Route::post('/update/{id}', 'ScholarshipAnnouncementController@update');
        Route::delete('/delete/{id}', 'ScholarshipAnnouncementController@destroy');
    });
    Route::prefix('scholarshippaperjury')->group(function () {
        Route::get('/', 'ScholarshipPaperJuryController@index');
        Route::post('/create', 'ScholarshipPaperJuryController@store');
        Route::get('/get/{id}', 'ScholarshipPaperJuryController@show');
        Route::post('/update/{id}', 'ScholarshipPaperJuryController@update');
        Route::delete('/delete/{id}', 'ScholarshipPaperJuryController@destroy');
    });
    Route::prefix('scholarshiptutorial')->group(function () {
        Route::get('/', 'ScholarshipTutorialController@index');
        Route::post('/create', 'ScholarshipTutorialController@store');
        Route::get('/get/{id}', 'ScholarshipTutorialController@show');
        Route::post('/update/{id}', 'ScholarshipTutorialController@update');
        Route::delete('/delete/{id}', 'ScholarshipTutorialController@destroy');
    });

    // BEASISWA LAINNYA
    Route::prefix('semesters')->group(function () {
        Route::get('/', 'ScholarshipSemestersController@index');
        Route::post('/create', 'ScholarshipSemestersController@store');
        Route::get('/get/{id}', 'ScholarshipSemestersController@show');
        Route::post('/update/{id}', 'ScholarshipSemestersController@update');
        Route::delete('/delete/{id}', 'ScholarshipSemestersController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('academicachievement')->group(function () {
        Route::get('/', 'ScholarshipAcademicAchievementsController@index');
        Route::post('/create', 'ScholarshipAcademicAchievementsController@store');
        Route::get('/get/{id}', 'ScholarshipAcademicAchievementsController@show');
        Route::post('/update/{id}', 'ScholarshipAcademicAchievementsController@update');
        Route::delete('/delete/{id}', 'ScholarshipAcademicAchievementsController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('competitionachievement')->group(function () {
        Route::get('/', 'ScholarshipCompetitionAchievementsController@index');
        Route::post('/create', 'ScholarshipCompetitionAchievementsController@store');
        Route::get('/get/{id}', 'ScholarshipCompetitionAchievementsController@show');
        Route::post('/update/{id}', 'ScholarshipCompetitionAchievementsController@update');
        Route::delete('/delete/{id}', 'ScholarshipCompetitionAchievementsController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('eventachievement')->group(function () {
        Route::get('/', 'ScholarshipEventAchievementsController@index');
        Route::post('/create', 'ScholarshipEventAchievementsController@store');
        Route::get('/get/{id}', 'ScholarshipEventAchievementsController@show');
        Route::post('/update/{id}', 'ScholarshipEventAchievementsController@update');
        Route::delete('/delete/{id}', 'ScholarshipEventAchievementsController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('organizationachievement')->group(function () {
        Route::get('/', 'ScholarshipOrganizationAchievementsController@index');
        Route::post('/create', 'ScholarshipOrganizationAchievementsController@store');
        Route::get('/get/{id}', 'ScholarshipOrganizationAchievementsController@show');
        Route::post('/update/{id}', 'ScholarshipOrganizationAchievementsController@update');
        Route::delete('/delete/{id}', 'ScholarshipOrganizationAchievementsController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('paperachievement')->group(function () {
        Route::get('/', 'ScholarshipPaperAchievementsController@index');
        Route::post('/create', 'ScholarshipPaperAchievementsController@store');
        Route::get('/get/{id}', 'ScholarshipPaperAchievementsController@show');
        Route::post('/update/{id}', 'ScholarshipPaperAchievementsController@update');
        Route::delete('/delete/{id}', 'ScholarshipPaperAchievementsController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('financialreport')->group(function () {
        Route::get('/', 'ScholarshipFinancialReportsController@index');
        Route::post('/create', 'ScholarshipFinancialReportsController@store');
        Route::get('/get/{id}', 'ScholarshipFinancialReportsController@show');
        Route::post('/update/{id}', 'ScholarshipFinancialReportsController@update');
        Route::delete('/delete/{id}', 'ScholarshipFinancialReportsController@destroy');
    });
    Route::middleware('auth:sanctum')->prefix('anotherscholarshipreport')->group(function () {
        Route::get('/', 'AnotherScholarshipReportController@index');
        Route::post('/create', 'AnotherScholarshipReportController@store');
        Route::get('/get/{id}', 'AnotherScholarshipReportController@show');
        Route::post('/update/{id}', 'AnotherScholarshipReportController@update');
        Route::delete('/delete/{id}', 'AnotherScholarshipReportController@destroy');
    });
    Route::prefix('levels')->group(function () {
        Route::get('/', 'ScholarshipLevelAchievementsController@index');
        Route::post('/create', 'ScholarshipLevelAchievementsController@store');
        Route::get('/get/{id}', 'ScholarshipLevelAchievementsController@show');
        Route::post('/update/{id}', 'ScholarshipLevelAchievementsController@update');
        Route::delete('/delete/{id}', 'ScholarshipLevelAchievementsController@destroy');
    });
});
