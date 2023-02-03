<?php
// Route::prefix('cc')->namespace('CommandCenter')->group(function() {
//     Route::group(['prefix'=>'commandcenter'], function(){
//         // Route::get('allfactory_qc', 'CCAllBranchController@allfac')->name('allfac.qc');
//         // Route::get('qc', 'CCAllBranchController@qc')->name('allcc.qc');
//         // Route::get('rework', 'CCAllBranchController@rework')->name('allcc.rework');
//         // Route::get('lines/{id}', 'CCAllBranchController@lines')->name('allcc.lines');
//         // Route::get('level2/{id}', 'CommandCenterController@level2')->name('cc.level2');
//         // Route::get('fqc/{id}','CommandCenterController@qc')->name("cc.qc");
//         // Route::get('frework/{id}', 'CCQualityController@rework')->name('cc.rework');
//         // Route::get('flines/{id}', 'CCQualityController@lines')->name('cc.lines');
//         Route::get('allfac', 'CCAllFactoryController@commandCenter')->name('commandCenter');
//     });
// });


Route::prefix('cc2')->namespace('CommandCenter2')->group(function() {
    Route::group(['prefix'=>'commandcenter2'], function(){
        Route::get('allfactory_qc', 'CCAllBranchController@allfac')->name('allfac2.qc');
        Route::get('qc', 'CCAllBranchController@qc')->name('allcc2.qc');
        Route::get('rework', 'CCAllBranchController@rework')->name('allcc2.rework');
        Route::get('lines/{id}', 'CCAllBranchController@lines')->name('allcc2.lines');
        Route::get('fqc/{id}','CommandCenterController@qc')->name("cc2.qc");
        Route::get('frework/{id}', 'CCQualityController@rework')->name('cc2.rework');
        Route::get('flines/{id}', 'CCQualityController@lines')->name('cc2.lines');
        Route::get('allfac', 'CCAllFactoryController@commandCenter2')->name('commandCenter2');
        Route::get('level2/{id}', 'CommandCenterController@CClevel2')->name('cc2.level2');

    });
});