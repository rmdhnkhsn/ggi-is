<?php
// Route::prefix('GGI INDAH')->namespace('CommandCenter')->group(function() {
//     Route::group(['prefix'=>'ggi-indah'], function(){
//         Route::get('ccindah/{id}', 'CCIndahController@index')->name('cindah.index');
//         Route::get('indahAll', 'CCIndahController@indahAll')->name('indah.all');
//     });
// });

Route::prefix('GGI_INDAH')->namespace('CommandCenter2')->group(function() {
    Route::group(['prefix'=>'ggi-indah2'], function(){
        Route::get('ccindah/{id}', 'CCIndahController@index')->name('cc2.indah');
        Route::get('indahAll', 'CCIndahController@indahAll')->name('indah2.all');
    });
});