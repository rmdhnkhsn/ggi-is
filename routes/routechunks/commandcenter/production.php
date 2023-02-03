<?php
// Route::prefix('CC')->namespace('CommandCenter')->group(function() {
//     Route::group(['prefix'=>'production'], function(){
//         Route::get('ccproduction', 'CCProductionController@index')->name('cproduction.index');
//         Route::get('pro_allbranch', 'CCProductionController@allbranch')->name('cproduction.allbranch');
//         Route::get('s-tower', 'CCProductionController@stower')->name('cproduction.stower');
//     });
// });

Route::prefix('CC')->namespace('CommandCenter2')->group(function() {
    Route::group(['prefix'=>'production2'], function(){
        Route::get('ccproduction', 'CCProductionController@index')->name('cproduction2.index');
        Route::get('pro_allbranch', 'CCProductionController@allbranch')->name('cproduction2.allbranch');
        Route::get('s-tower', 'CCProductionController@stower')->name('cproduction2.stower');


    });
});