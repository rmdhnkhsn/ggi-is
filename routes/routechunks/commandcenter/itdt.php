<?php
Route::prefix('it_dt')->namespace('CommandCenter')->group(function() {
    Route::group(['prefix'=>'it-dt'], function(){
        Route::get('it_dt_all', 'CCITDTController@ItAll')->name('it_dt.all');
        Route::get('ticketing/{id}', 'CCITDTController@index')->name('cc.it.dt');
        Route::get('ticket_detail/{id}', 'CCITDTController@detail')->name("cc.tiket_detail");
    });
});
// Route::prefix('it_dt')->namespace('CommandCenter')->group(function() {
//     Route::group(['prefix'=>'it-dt'], function(){
//         Route::get('it_dt_all', 'CCITDTController@ItAll')->name('it_dt.all');
//         Route::get('ticketing/{id}', 'CCITDTController@index')->name('cc.it.dt');
//         Route::get('ticket_detail/{id}', 'CCITDTController@detail')->name("cc.tiket_detail");
// //     //     Route::get('qc', 'CCAllBranchController@qc')->name('allcc.qc');
// //     //     Route::get('rework', 'CCAllBranchController@rework')->name('allcc.rework');
// //     //     Route::get('lines/{id}', 'CCAllBranchController@lines')->name('allcc.lines');
// //     //     Route::get('level2/{id}', 'CommandCenterController@level2')->name('cc.level2');
// //     //     Route::get('fqc/{id}','CommandCenterController@qc')->name("cc.qc");
// //     //     Route::get('frework/{id}', 'CCQualityController@rework')->name('cc.rework');
// //     //     Route::get('flines/{id}', 'CCQualityController@lines')->name('cc.lines');
// //     //     Route::get('allfac', 'CCAllFactoryController@commandCenter')->name('commandCenter');
//     });
// });

Route::prefix('IT-DT')->namespace('CommandCenter2')->group(function() {
    Route::group(['prefix'=>'it-dt2'], function(){
        
        Route::get('it_dt_all', 'CCITDTController@ItAll')->name('it_dt2.all');
        Route::get('cc_it/{id}', 'CCITDTController@index')->name('cc2.it.dt');
        Route::get('info', 'CCITDTController@info')->name('cc2.it.info');
        Route::get('detail/{id}', 'CCITDTController@detail')->name("cc2.tiket_detail");
    });
});