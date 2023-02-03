<?php
Route::prefix('prc')->namespace('Purchasing')->group(function() {

    Route::prefix('request-issue-ir')->group(function() {
        Route::get('', 'RequestIssueIRController@index')->name('requestIR.index');
        Route::get('/edit{id}', 'RequestIssueIRController@edit')->name('requestIR.edit');
        Route::post('', 'RequestIssueIRController@store')->name('requestIR.store');
        Route::post('/edit', 'RequestIssueIRController@update')->name('requestIR.update');

        Route::get('/delete{id}', 'RequestIssueIRController@delete')->name('requestIR.delete');
        Route::post('/search-uom', 'RequestIssueIRController@search_uom')->name('requestIR.search_uom');
        


    });

});

