<?php
Route::prefix('apv')->namespace('Approval')->group(function() {
    Route::get('/', 'ApprovalController@home')->name("approval-home");

    Route::group(['prefix'=>'acconting'], function(){
        Route::get('/', 'AppAccountingController@request_approval')->name("request-approval-acc");
        Route::get('/approve{id}-{key}', 'AppAccountingController@approve_acc')->name("tiket-approval-acc");
        Route::post('/approve-all', 'AppAccountingController@approve_acc_all')->name("tiket-approvalall-acc");
        Route::post('/filter', 'AppAccountingController@request_filter')->name("filter-approval-acc");
    });
});