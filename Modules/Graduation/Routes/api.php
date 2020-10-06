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

Route::middleware('auth:api')->get('/graduation', function (Request $request) {
    return $request->user();
});

Route::prefix('/graduation')->group(function () {
    Route::prefix('undangan')->group(function () {
        Route::get('/', 'GraduationUndanganController@index');
        Route::post('/create', 'GraduationUndanganController@store');
        Route::get('/get/{id}', 'GraduationUndanganController@show');
        Route::post('/update/{id}', 'GraduationUndanganController@update');
    });
    Route::prefix('sk')->group(function () {
        Route::get('/', 'GraduationSkController@index');
        Route::post('/create', 'GraduationSkController@store');
        Route::get('/get/{id}', 'GraduationSkController@show');
        Route::post('/update/{id}', 'GraduationSkController@update');
    });
    Route::prefix('home-gallery')->group(function () {
        Route::get('/', 'GraduationHomeGalleryController@index');
        Route::post('/create', 'GraduationHomeGalleryController@store');
        Route::get('/get/{id}', 'GraduationHomeGalleryController@show');
        Route::post('/update/{id}', 'GraduationHomeGalleryController@update');
    });
    Route::prefix('tema')->group(function () {
        Route::get('/', 'GraduationTemaController@index');
        Route::post('/create', 'GraduationTemaController@store');
        Route::get('/get/{id}', 'GraduationTemaController@show');
        Route::post('/update/{id}', 'GraduationTemaController@update');
    });
    Route::prefix('visi-misi')->group(function () {
        Route::get('/', 'GraduationVisiMisiController@index');
        Route::post('/create', 'GraduationVisiMisiController@store');
        Route::get('/get/{id}', 'GraduationVisiMisiController@show');
        Route::post('/update/{id}', 'GraduationVisiMisiController@update');
    });
    Route::prefix('lagu-upj')->group(function () {
        Route::get('/', 'GraduationLaguUpjController@index');
        Route::post('/create', 'GraduationLaguUpjController@store');
        Route::get('/get/{id}', 'GraduationLaguUpjController@show');
        Route::post('/update/{id}', 'GraduationLaguUpjController@update');
    });
    Route::prefix('janji-wisudawan')->group(function () {
        Route::get('/', 'GraduationJanjiWisudawanController@index');
        Route::post('/create', 'GraduationJanjiWisudawanController@store');
        Route::get('/get/{id}', 'GraduationJanjiWisudawanController@show');
        Route::post('/update/{id}', 'GraduationJanjiWisudawanController@update');
    });
    Route::prefix('profil-petinggi')->group(function () {
        Route::get('/', 'GraduationProfilPetinggiController@index');
        Route::post('/create', 'GraduationProfilPetinggiController@store');
        Route::get('/get/{id}', 'GraduationProfilPetinggiController@show');
        Route::post('/update/{id}', 'GraduationProfilPetinggiController@update');
    });
    Route::prefix('profil-prodi')->group(function () {
        Route::get('/', 'GraduationProfilProdiController@index');
        Route::post('/create', 'GraduationProfilProdiController@store');
        Route::get('/get/{id}', 'GraduationProfilProdiController@show');
        Route::post('/update/{id}', 'GraduationProfilProdiController@update');
    });
    Route::prefix('sambutan')->group(function () {
        Route::get('/', 'GraduationSambutanController@index');
        Route::post('/create', 'GraduationSambutanController@store');
        Route::get('/get/{id}', 'GraduationSambutanController@show');
        Route::post('/update/{id}', 'GraduationSambutanController@update');
    });
    Route::prefix('sejarah')->group(function () {
        Route::get('/', 'GraduationSejarahUpjController@index');
        Route::post('/create', 'GraduationSejarahUpjController@store');
        Route::get('/get/{id}', 'GraduationSejarahUpjController@show');
        Route::post('/update/{id}', 'GraduationSejarahUpjController@update');
    });
    Route::prefix('laporan-akademik')->group(function () {
        Route::get('/', 'GraduationLaporanAkademikController@index');
        Route::post('/create', 'GraduationLaporanAkademikController@store');
        Route::get('/get/{id}', 'GraduationLaporanAkademikController@show');
        Route::post('/update/{id}', 'GraduationLaporanAkademikController@update');
    });
    Route::prefix('sarana-prasarana')->group(function () {
        Route::get('/', 'GraduationSaranaPrasaranaController@index');
        Route::post('/create', 'GraduationSaranaPrasaranaController@store');
        Route::get('/get/{id}', 'GraduationSaranaPrasaranaController@show');
        Route::post('/update/{id}', 'GraduationSaranaPrasaranaController@update');
    });
    Route::prefix('kegiatan-prodi')->group(function () {
        Route::get('/', 'GraduationKegiatanProdiController@index');
        Route::post('/create', 'GraduationKegiatanProdiController@store');
        Route::get('/get/{id}', 'GraduationKegiatanProdiController@show');
        Route::post('/update/{id}', 'GraduationKegiatanProdiController@update');
    });
    Route::prefix('lulusan-prodi')->group(function () {
        Route::get('/', 'GraduationLulusanProdiController@index');
        Route::post('/create', 'GraduationLulusanProdiController@store');
        Route::get('/get/{id}', 'GraduationLulusanProdiController@show');
        Route::post('/update/{id}', 'GraduationLulusanProdiController@update');
    });
    Route::prefix('lulusan-terbaik')->group(function () {
        Route::get('/', 'GraduationLulusanTerbaikController@index');
        Route::post('/create', 'GraduationLulusanTerbaikController@store');
        Route::get('/get/{id}', 'GraduationLulusanTerbaikController@show');
        Route::post('/update/{id}', 'GraduationLulusanTerbaikController@update');
    });
    Route::prefix('panitia')->group(function () {
        Route::get('/', 'GraduationPanitiaController@index');
        Route::post('/create', 'GraduationPanitiaController@store');
        Route::get('/get/{id}', 'GraduationPanitiaController@show');
        Route::post('/update/{id}', 'GraduationPanitiaController@update');
    });
    Route::prefix('panitia-gallery')->group(function () {
        Route::get('/', 'GraduationPanitiaGalleryController@index');
        Route::post('/create', 'GraduationPanitiaGalleryController@store');
        Route::get('/get/{id}', 'GraduationPanitiaGalleryController@show');
        Route::post('/update/{id}', 'GraduationPanitiaGalleryController@update');
    });
    Route::prefix('unit-lain')->group(function () {
        Route::get('/', 'GraduationUnitLainController@index');
        Route::post('/create', 'GraduationUnitLainController@store');
        Route::get('/get/{id}', 'GraduationUnitLainController@show');
        Route::post('/update/{id}', 'GraduationUnitLainController@update');
    });
    Route::prefix('unit-lain-gallery')->group(function () {
        Route::get('/', 'GraduationUnitLainGalleryController@index');
        Route::post('/create', 'GraduationUnitLainGalleryController@store');
        Route::get('/get/{id}', 'GraduationUnitLainGalleryController@show');
        Route::post('/update/{id}', 'GraduationUnitLainGalleryController@update');
    });
    Route::prefix('sponsorship')->group(function () {
        Route::get('/', 'GraduationSponsorshipController@index');
        Route::post('/create', 'GraduationSponsorshipController@store');
        Route::get('/get/{id}', 'GraduationSponsorshipController@show');
        Route::post('/update/{id}', 'GraduationSponsorshipController@update');
    });
    Route::prefix('sponsorship-gallery')->group(function () {
        Route::get('/', 'GraduationSponsorshipGalleryController@index');
        Route::post('/create', 'GraduationSponsorshipGalleryController@store');
        Route::get('/get/{id}', 'GraduationSponsorshipGalleryController@show');
        Route::post('/update/{id}', 'GraduationSponsorshipGalleryController@update');
    });
});