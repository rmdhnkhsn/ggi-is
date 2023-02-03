<?php 

Route::prefix('pic')->namespace('PPIC\form_return')->group(function() {
    Route::get('/dashboard', 'PPICFormReturnController@home')->name("form_return.home");
    Route::group(['prefix'=>'form-return'], function(){
        Route::get('/Reject-Cutting', 'PPICFormReturnController@index')->name("form_return.index");
        Route::post('/update-process', 'PPICFormReturnController@update')->name("form_return.update.process");
        
        // Route::get('/see', 'RejectCuttingController@daftar_reject')->name("form_return.see");
      });
    
});