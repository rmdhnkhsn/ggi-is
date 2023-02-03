<?php
Route::prefix('cmc')->namespace('CommandCenter2')->group(function() {
    Route::group(['prefix'=>'icr'], function(){
        Route::get('all-branch', 'CCAuditController@index')->name('cc.internal.audit');
        Route::get('branch{id}/ledger-vs-IT', 'CCAuditController@ledger_it')->name('cc.icr.ledge-it');
        Route::get('branch{id}/test', 'CCAuditController@test')->name('cc.icr.test');
    });
});