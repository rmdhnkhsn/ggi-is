<?php
Route::prefix('marketing')->namespace('Marketing')->group(function() {
    Route::group(['prefix'=>'masterpo'], function(){
        Route::get('/', 'MasterpoController@index')->name('marketing.masterpo');
        Route::get('create', 'MasterpoController@create')->name('masterpo.create');
        Route::post('store','MasterpoController@store')->name('masterpo.store');
        // Route::get('fetch-store','MasterpoController@fetchstore');
        Route::get('style/{id}','MasterpoController@style')->name('masterpo.style');
        Route::get('addstyle/{id}','MasterpoController@astyle')->name('masterpo.astyle');
        Route::post('poststyle/{id}','MasterpoController@poststyle')->name('masterpo.pstyle');
        Route::get('edit-image/{id}','MasterpoController@edit')->name('edit-image');
        Route::post('update-image/{id}','MasterpoController@update')->name('update-image');
        // Coba Lampu
        Route::get('coba', 'MasterpoController@coba')->name('coba');

    });

});

