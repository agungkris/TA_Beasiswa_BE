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

Route::middleware('auth:api')->get('/commandcenter', function (Request $request) {
    return $request->user();
});

Route::prefix('/command-center')->group(function(){
    Route::prefix('periods')->group(function(){
        Route::get('/','PeriodsController@index');
        Route::post('/create','PeriodsController@store');
        Route::get('/{id}','PeriodsController@show');
        Route::post('/update/{id}','PeriodsController@update');
        Route::delete('/delete/{id}','PeriodsController@destroy');
    });
    
    Route::prefix('achievementcategory')->group(function(){
        Route::get('/','AchievementCategoryController@index');
        Route::post('/create','AchievementCategoryController@store');
        Route::get('/{id}','AchievementCategoryController@show');
        Route::post('/update/{id}','AchievementCategoryController@update');
        Route::delete('/delete/{id}','AchievementCategoryController@destroy');
        
    });

    Route::prefix('collaborationperiods')->group(function(){
        Route::get('/','CollaborationPeriodsController@index');
        Route::post('/create','CollaborationPeriodsController@store');
        Route::get('/{id}','CollaborationPeriodsController@show');
        Route::post('/update/{id}','CollaborationPeriodsController@update');
        Route::delete('/delete/{id}','CollaborationPeriodsController@destroy');
    });

    Route::prefix('collaborationscope')->group(function(){
        Route::get('/','CollaborationScopeController@index');
        Route::post('/create','CollaborationScopeController@store');
        Route::get('/{id}','CollaborationScopeController@show');
        Route::post('/update/{id}','CollaborationScopeController@update');
        Route::delete('/delete/{id}','CollaborationScopeController@destroy');
    });

    Route::prefix('copyrightcategory')->group(function(){
        Route::get('/','CopyrightCategoryController@index');
        Route::post('/create','CopyrightCategoryController@store');
        Route::get('/{id}','CopyrightCategoryController@show');
        Route::post('/update/{id}','CopyrightCategoryController@update');
        Route::delete('/delete/{id}','CopyrightCategoryController@destroy');
    });

    Route::prefix('creationcategory')->group(function(){
        Route::get('/','CreationCategoryController@index');
        Route::post('/create','CreationCategoryController@store');
        Route::get('/{id}','CreationCategoryController@show');
        Route::post('/update/{id}','CreationCategoryController@update');
        Route::delete('/delete/{id}','CreationCategoryController@destroy');
    });

    Route::prefix('evaluationperiods')->group(function(){
        Route::get('/','EvaluationPeriodsController@index');
        Route::post('/create','EvaluationPeriodsController@store');
        Route::get('/{id}','EvaluationPeriodsController@show');
        Route::post('/update/{id}','EvaluationPeriodsController@update');
        Route::delete('/delete/{id}','EvaluationPeriodsController@destroy');
    });

    Route::prefix('generation')->group(function(){
        Route::get('/','GenerationController@index');
        Route::post('/create','GenerationController@store');
        Route::get('/{id}','GenerationController@show');
        Route::post('/update/{id}','GenerationController@update');
        Route::delete('/delete/{id}','GenerationController@destroy');
    });

    Route::prefix('internshipscheme')->group(function(){
        Route::get('/','InternshipSchemeController@index');
        Route::post('/create','InternshipSchemeController@store');
        Route::get('/{id}','InternshipSchemeController@show');
        Route::post('/update/{id}','InternshipSchemeController@update');
        Route::delete('/delete/{id}','InternshipSchemeController@destroy');
    });

    Route::prefix('publicationcategory')->group(function(){
        Route::get('/','PublicationCategoryController@index');
        Route::post('/create','PublicationCategoryController@store');
        Route::get('/{id}','PublicationCategoryController@show');
        Route::post('/update/{id}','PublicationCategoryController@update');
        Route::delete('/delete/{id}','PublicationCategoryController@destroy');
    });

    Route::prefix('scopecategory')->group(function(){
        Route::get('/','ScopeCategoryController@index');
        Route::post('/create','ScopeCategoryController@store');
        Route::get('/{id}','ScopeCategoryController@show');
        Route::post('/update/{id}','ScopeCategoryController@update');
        Route::delete('/delete/{id}','ScopeCategoryController@destroy');
    });

    Route::prefix('specialization')->group(function(){
        Route::get('/','SpecializationController@index');
        Route::post('/create','SpecializationController@store');
        Route::get('/{id}','SpecializationController@show');
        Route::post('/update/{id}','SpecializationController@update');
        Route::delete('/delete/{id}','SpecializationController@destroy');
    });

    Route::prefix('specializationtopic')->group(function(){
        Route::get('/','SpecializationTopicController@index');
        Route::post('/create','SpecializationTopicController@store');
        Route::get('/{id}','SpecializationTopicController@show');
        Route::post('/update/{id}','SpecializationTopicController@update');
        Route::delete('/delete/{id}','SpecializationTopicController@destroy');
    });

    #region notmasterdata
    Route::prefix('curriculum')->group(function(){
        Route::get('/','CurriculumController@index');
        Route::post('/create','CurriculumController@store');
        Route::get('/{curriculumID}','CurriculumController@show');
        Route::post('/{curriculumID}/specialization/add','CurriculumController@addSpecialization');
        Route::post('/{curriculumID}/specialization/remove/{id}','CurriculumController@removeSpecialization');
        Route::post('/update/{id}','CurriculumController@update');
    });

    Route::prefix('internship')->group(function(){
        Route::get('/','InternshipController@index');
        Route::post('/create','InternshipController@store');
        Route::get('/{id}','InternshipController@show');
        Route::post('/update/{id}','InternshipController@update');
    });
    
    Route::prefix('thesis')->group(function(){
        Route::get('/','ThesisController@index');
        Route::post('/create','ThesisController@store');
        Route::get('/{id}','ThesisController@show');
        Route::post('/update/{id}','ThesisController@update');
    });

    Route::prefix('researchgrant')->group(function(){
        Route::get('/','ResearchGrantController@index');
        Route::post('/create','ResearchGrantController@store');
        Route::get('/{id}','ResearchGrantController@show');
        Route::post('/update/{id}','ResearchGrantController@update');
    });

    Route::prefix('researchcopyright')->group(function(){
        Route::get('/','ResearchCopyrightController@index');
        Route::post('/create','ResearchCopyrightController@store');
        Route::get('/{id}','ResearchCopyrightController@show');
        Route::post('/update/{id}','ResearchCopyrightController@update');
    });

    Route::prefix('researchpublication')->group(function(){
        Route::get('/','ResearchPublicationController@index');
        Route::post('/create','ResearchPublicationController@store');
        Route::get('/{id}','ResearchPublicationController@show');
        Route::post('/update/{id}','ResearchPublicationController@update');
    });

    Route::prefix('communitydedicationgrant')->group(function(){
        Route::get('/','CommunityDedicationGrantController@index');
        Route::post('/create','CommunityDedicationGrantController@store');
        Route::get('/{id}','CommunityDedicationGrantController@show');
        Route::post('/update/{id}','CommunityDedicationGrantController@update');
    });

    Route::prefix('communitydedicationpublication')->group(function(){
        Route::get('/','CommunityDedicationPublicationController@index');
        Route::post('/create','CommunityDedicationPublicationController@store');
        Route::get('/{id}','CommunityDedicationPublicationController@show');
        Route::post('/update/{id}','CommunityDedicationPublicationController@update');
    });

    Route::prefix('communitydedicationcollaboration')->group(function(){
        Route::get('/','CommunityDedicationCollaborationController@index');
        Route::post('/create','CommunityDedicationCollaborationController@store');
        Route::get('/{id}','CommunityDedicationCollaborationController@show');
        Route::post('/update/{id}','CommunityDedicationCollaborationController@update');
    });

    Route::prefix('achievement')->group(function(){
        Route::get('/','AchievementController@index');
        Route::post('/create','AchievementController@store');
        Route::get('/{id}','AchievementController@show');
        Route::post('/update/{id}','AchievementController@update');
    });

    Route::prefix('organization')->group(function(){
        Route::get('/','OrganizationController@index');
        Route::post('/create','OrganizationController@store');
        Route::get('/{id}','OrganizationController@show');
        Route::post('/update/{id}','OrganizationController@update');
    });

    Route::prefix('creation')->group(function(){
        Route::get('/','CreationController@index');
        Route::post('/create','CreationController@store');
        Route::get('/{id}','CreationController@show');
        Route::post('/update/{id}','CreationController@update');
    });

    Route::prefix('forum')->group(function(){
        Route::get('/','ForumController@index');
        Route::post('/create','ForumController@store');
        Route::get('/{id}','ForumController@show');
        Route::post('/update/{id}','ForumController@update');
    });

});
