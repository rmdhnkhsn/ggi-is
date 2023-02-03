<?php
Route::prefix('marketing')->namespace('Marketing\TrimCard')->group(function() {
    Route::group(['prefix'=>'trimcard'], function(){
        Route::get('/dashboard', 'TrimCardController@dashboard')->name('trimcard.dashboard');
        Route::get('/index', 'TrimCardController@index')->name('trimcard.index');
        Route::post('/get-wo', 'TrimCardController@get_wo')->name('trimcard.get_wo');
        Route::post('/wo/store', 'TrimCardController@store')->name('trimcard.store');
        Route::get('/delete/{id}', 'TrimCardController@delete')->name('trimcard.delete');
        Route::get('/edit/{id}', 'TrimCardController@edit')->name('trimcard.edit');
        Route::post('/update', 'TrimCardController@update')->name('trimcard.update');
        Route::get('/breakdown/{id}', 'TrimCardController@breakdown')->name('trimcard.breakdown');
        Route::post('/get/{id}', 'TrimCardController@get')->name('trimcard.get');
        Route::post('/excel/{id}', 'TrimCardController@excel')->name('trimcard.excel');
        Route::post('/pdf/{id}', 'TrimCardController@pdf')->name('trimcard.pdf');
        Route::get('/file/{id}', 'TrimCardPDFController@file')->name('trimcard.file');
        Route::post('/add_file', 'TrimCardPDFController@addfile')->name('trimcard.addfile');
        Route::get('/delete_file/{id}', 'TrimCardPDFController@delete_file')->name('trimcard.delete_file');
        Route::get('/download_file/{id}', 'TrimCardPDFController@getFile')->name('trimcard.download_file');
    });

});