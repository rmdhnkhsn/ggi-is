<?php
use Illuminate\Support\Facades\Route;

Route::prefix('prd')->namespace('Cutting')->group(function() {
    Route::group(['prefix'=>'cutting'], function(){
        Route::get('/', 'CuttingController@dashboard')->name("cutting.dashboard");
        Route::get('hrd', 'CuttingController@hrd')->name("hrd.index");
        Route::get('ppic', 'CuttingController@ppic')->name("ppic.index");
        Route::get('adm-cutting', 'CuttingController@adm_cutting')->name("admcutting.index");
        Route::get('adm-cutting/create', 'CuttingController@adm_create')->name("create-form");
        Route::get('gelaran', 'CuttingController@gelar')->name("gelar.index");
        Route::get('mulai-gelar', 'CuttingController@mulai_gelar')->name("mulai-gelar");
        Route::get('form-gelar', 'CuttingController@form_gelar')->name("form-gelar");
    });
}); 