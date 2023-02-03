<?php
Route::prefix('marketing')->namespace('Marketing\WorkSheet')->group(function() {
    Route::group(['prefix'=>'worksheet'], function(){
        Route::get('/index', 'WorkSheetController@index')->name('worksheet.index');
        Route::get('/create/general/{id}', 'WorkSheetController@general')->name('worksheet.general');
        Route::get('/create/general/search_or/{id}', 'WorkSheetController@search_or')->name('worksheet.search_or');
        Route::post('/create/general/store/{id}', 'WorkSheetController@general_store')->name('worksheet.general_store');
        Route::get('/create/{id}', 'WorkSheetController@search_or')->name('worksheet.create');
        Route::get('/create/breakdown/{id}', 'WorkSheetController@breakdown')->name('worksheet.breakdown');
        Route::get('/create/material_pabric/{id}', 'WorkSheetController@material_pabric')->name('worksheet.material_pabric');
        Route::get('/create/material_sewing/{id}', 'WorkSheetController@material_sewing')->name('worksheet.material_sewing');
        Route::get('/create/measurement/{id}', 'WorkSheetController@measurement')->name('worksheet.measurement');
        Route::get('/create/packaging/{id}', 'WorkSheetController@packaging')->name('worksheet.packaging');
        Route::get('/create/finish/{id}', 'WorkSheetController@finish')->name('worksheet.finish');
        Route::get('/create/preview/{id}', 'WorkSheetController@preview')->name('worksheet.preview');
    });
});